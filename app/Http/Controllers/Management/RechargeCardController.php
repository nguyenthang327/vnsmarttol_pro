<?php

namespace App\Http\Controllers\Management;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRechargeCardRequest;
use App\Models\History;
use App\Models\RechargeCardHistory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RechargeCardController extends Controller
{
    public function ajaxGetRechargeCardHistory(Request $request){
        // dump(auth()->user());
        // Lấy các tham số từ AJAX request
        // dd($request->all());
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $searchValue = $request->input('search.value');
        $orderColumn = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');

        $user = auth()->user();

        $query = RechargeCardHistory::query();
        // Áp dụng các điều kiện tìm kiếm nếu cần
        if (!empty($searchValue)) {
            $query->where('seri', 'like', '%' . $searchValue . '%')
                ->orWhere('id_card', 'like', '%' . $searchValue . '%')
                ->orWhere('trans', 'like', '%' . $searchValue . '%');
        }
        $query->where('user_id', $user->id);

        // if (!empty($keyword)) {
        //     $query->where('username', 'like', '%' . $keyword . '%');
        // }

        // Sắp xếp dữ liệu
        $query->orderBy($orderColumn, $orderDir);
        // Lấy tổng số bản ghi trước khi áp dụng phân trang
        $totalRecords = $query->count();
        // Áp dụng phân trang
        $query->offset($start)->limit($length);
        // Lấy dữ liệu cuối cùng
        $data = $query->get();
        // Chuyển định dạng dữ liệu theo yêu cầu
        $formattedData = [
            'aaData' => $data,
            'iTotalDisplayRecords' => $totalRecords,
            'iTotalRecords' => $totalRecords,
        ];
        return response()->json($formattedData);
    }

    //
    public function store(StoreRechargeCardRequest $request)
    {
        DB::beginTransaction();
        try {
            $request_id = StringHelper::generateAPI();
            $command = 'charging';
            $loaithe = $request->input('NetworkCode');
            $mathe = $request->input('NumberCard');
            $seri = $request->input('SeriCard');
            $menhgiareal = $request->input('PricesExchange');
            $partnerid = env('PARTNER_ID', '');

            $sig = md5(env('PARTNER_KEY', '') . $mathe . $seri);
            $uri = "http://trumthe.vn/chargingws/v2?telco=$loaithe&code=$mathe&serial=$seri&amount=$menhgiareal&request_id=$request_id&partner_id=$partnerid&sign=$sig&command=$command";
            $response  = Http::get($uri);

            $obj = json_decode($response);
            $status = $obj->status;

            if ($status != 99) {
                throw new \Exception("Yêu cầu nạp thẻ đã bị từ chối, xin vui lòng kiểm tra thông tin nhập vào hoặc lỗi chưa xác định trên hệ thống ERR:' . $status . ' !");
            }

            $trans = $obj->trans_id; // mã đối soát       
            // tạo ra một yêu cầu nạp  ở domain phụ
            $user = auth()->user();

            $chietkhau = ($menhgiareal / 100) * (100 - env('DISCOUNT', 0));
            $thucnhan = ($menhgiareal - $chietkhau);
            $domain = InforWebHelper::getDomain();

            $params = [
                'user_id' => $user->id,
                'username' => $user->username,
                'type' => ucfirst(strtolower($loaithe)),
                'denomination_money' => $menhgiareal,
                'actually_received' => $thucnhan,
                'seri' => $seri,
                'id_card' => $mathe,
                'trans' => $trans,
                'status' => RechargeCardHistory::STATUS_PENDING,
                'identity_website' => $domain,
            ];
            $rechargeCard = RechargeCardHistory::create($params);

            DB::commit();
            return response()->json([
                'status' => 1,
                'msg' => 'Yêu cầu nạp thẻ đã được ghi nhận, xin vui lòng kiểm tra kết quả ở lịch sử nạp !',
                'data' => $rechargeCard,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('[RechargeCardController][store] error:' . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Xử lý callback khi nạp bằng thẻ cào
     */
    public function rechargeCardCallback()
    {
        try {
            if (isset($_GET['status']) && isset($_GET['request_id']) && isset($_GET['declared_value']) && isset($_GET['value']) && isset($_GET['amount']) && isset($_GET['code']) && isset($_GET['serial']) && isset($_GET['telco']) && isset($_GET['trans_id']) && isset($_GET['callback_sign'])) {
                $status =  $_GET['status']; //1,2,3,4,99,100
                $request_id =  $_GET['request_id'];
                $declared_value =  $_GET['declared_value'];
                $value =  $_GET['value']; // Mệnh giá thực
                $amount =  $_GET['amount'];
                $code =  $_GET['code'];
                $serial =  $_GET['serial'];
                $telco =  $_GET['telco'];
                $trans_id =  $_GET['trans_id']; // Đã có ở bước gửi thẻ
                $callback_sign =  $_GET['callback_sign'];

                $rechargeCardHistory = RechargeCardHistory::where('trans', $trans_id)
                    ->where('seri', $serial)
                    ->first();

                # Nếu không có lịch sử giao dịch
                if (!$rechargeCardHistory) {
                    throw new Exception("Không có mã trans_id nào tương ứng trên hệ thống");
                }

                if ($rechargeCardHistory->status == RechargeCardHistory::STATUS_PENDING) {
                    if ($status == 1) {
                        if ($value == $declared_value) {
                            $note = 'Nạp thẻ cào thành công mệnh giá ' . $declared_value . ' ';
                            $user = User::where('id', $rechargeCardHistory->user_id)->first();
                            $allMoney = $rechargeCardHistory->actually_received + $user->all_money; // tính lại tiền
            
                            # Thêm lịch sử
                            History::create([
                                'user_id' => $rechargeCardHistory->user_id,
                                'username' => $rechargeCardHistory->username,
                                'count' => 1,
                                'price' => $rechargeCardHistory->actually_received, // giá nhận
                                'price_current' =>  $user->all_money,
                                'price_left' => $allMoney,
                                'math' => '+',
                                'type' => History::TYPE_RECHARGE_CARD,
                                'note' => $note,
                                'status' => 1, // nạp thành công
                                'identity_website' => $rechargeCardHistory->identity_website,
                            ]);

                            # update all money of user
                            $user->all_money = $allMoney;
                            $user->save();

                            # update lịch sử nạp card
                            $rechargeCardHistory->status = RechargeCardHistory::STATUS_SUCCESS;
                            $rechargeCardHistory->save();
                            Log::info('[RechargeCardController][rechargeCardCallback] Nạp thẻ thành công');
                        } else {
                            $rechargeCardHistory->status = RechargeCardHistory::STATUS_ERROR;
                            $rechargeCardHistory->save();
                            Log::info('[RechargeCardController][rechargeCardCallback] Từ chối thẻ');
                        }
                        
                    } else if (in_array($status, [2, 3])){
                        $rechargeCardHistory->status = RechargeCardHistory::STATUS_ERROR;
                        $rechargeCardHistory->save();
                        Log::info("[RechargeCardController][rechargeCardCallback]  Status: $status. Từ chối thẻ. " ); 
                    } else if(in_array($status, [4, 100])){
                        $rechargeCardHistory->status = RechargeCardHistory::STATUS_MAINTAIN;
                        $rechargeCardHistory->save();
                        Log::info("[RechargeCardController][rechargeCardCallback]  Status: $status. Từ chối thẻ. " ); 
                    } elseif ($status == 99) {
                        #do nothing
                        Log::info("[RechargeCardController][rechargeCardCallback]  Status: $status. Chưa có kết quả. " ); 
                    }
                } else {
                    Log::info("[RechargeCardController][rechargeCardCallback] Thẻ này đã có kết quả vui lòng không spam callback. " ); 
                }
            }
        } catch (Exception $e) {
            Log::error('[RechargeCardController][rechargeCardCallback] error:' . $e->getMessage());
            throw new Exception('[RechargeCardController][rechargeCardCallback] error ' . $e->getMessage());
        }
    }
}
