<?php

namespace App\Http\Controllers\Management;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRechargeCardRequest;
use App\Models\RechargeCardHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RechargeCardController extends Controller
{
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
}
