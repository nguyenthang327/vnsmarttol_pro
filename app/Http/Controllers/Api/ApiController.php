<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\ServicePack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index(Request $request)
    {
        $Api_token = $request->header('Api-Token');
        $id_order = Str::random(15);
        if (empty($Api_token)) {

            return response()->json([
                'staus' => false,
                'message' => 'Api-Token phải bắt buộc'
            ], 201);
        } else {
            $user = User::where('api', $Api_token)->first();
            if (empty($user)) {
                return response()->json(['status' => 0, 'message' => 'Api-Token này không tồn tại'], 200);
            }
            if ($request->type == 'like-sale') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|string|max:100',
                    'server_order' => 'required|string',
                    'reaction' => 'required|string',
                    'speed' => 'required',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-post-sale',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePostSale($idpost, $server_order, $reaction, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['link_post'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];
                                $type_service = 'subgiare' . 'facebook';
                                $user->price = $money_user;
                                $user->save();
                                History::create([
                                    'admin_note' => null,
                                    'count' => $amount,
                                    'data' => "",
                                    'user_id' => $user->id,
                                    'link' => $link_post,
                                    'username' => $user->username,
                                    'math' => "-",
                                    'uid' => $request->input('uid'),
                                    'msg' => "Bạn đã order like sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-post-sale',
                                    'server' => $server_order,
                                    'time' => time(),
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'code_order' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => 'active',
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'like-speed') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|string|max:100',
                    'server_order' => 'required|string',
                    'reaction' => 'required|string',
                    'speed' => 'required',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-post-speed',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->likePostSpeed($idpost, $server_order, $reaction, $request->speed, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['link_post'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];
                                $type_service = 'subgiare' . 'facebook';
                                $user->price = $money_user;
                                $user->save();
                                History::create([
                                    'admin_note' => null,
                                    'count' => $amount,
                                    'data' => "",
                                    'user_id' => $user->id,
                                    'link' => $link_post,
                                    'username' => $user->username,
                                    'math' => "-",
                                    'uid' => $request->input('uid'),
                                    'msg' => "Bạn đã order like speed với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-post-speed',
                                    'server' => $server_order,
                                    'time' => time(),
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'code_order' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => 'active',
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);

                            }
                        }
                    }
                }
            } else {
                return response()->json(['status' => 0, 'message' => 'Không tìm thấy dịch vụ này'], 201);
            }
        }
    }
}
