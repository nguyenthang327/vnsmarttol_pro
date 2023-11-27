<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\ServicePack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
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
                'msg' => 'Api-Token phải bắt buộc'
            ], 201);
        } else {
            $user = User::where('api', $Api_token)->first();
            if (empty($user)) {
                return response()->json(['status' => 0, 'msg' => 'Api-Token này không tồn tại'], 200);
            }
            if ($request->type == 'like-sale') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|string|max:100',
                    'server_order' => 'required|string',
                    'reaction' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'required|string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-post-sale',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->url;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->likePostSale($idpost, $server_order, $reaction, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data likePostSale: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? null;
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
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
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
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-post-speed',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
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
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data likePostSpeed: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? $result['data']['idpost'] ?? null;
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
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);

                            }
                        }
                    }
                }
            } elseif ($request->type == 'like-comment') {
                $validator = Validator::make($request->all(), [
                    'idcomment' => 'required|numeric',
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
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-comment',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idcomment = $request->idcomment;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->likeComment($idcomment, $server_order, $reaction, $request->speed, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data likeComment: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? $result['data']['idcomment'] ?? null;
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
                                    'msg' => "Bạn đã order like comment với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-post-speed',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'comment-sale') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|numeric',
                    'server_order' => 'required|string',
                    'comment' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'comment-sale',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $comment = $request->comment;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->commentSale($idpost, $server_order, $comment, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data commentSale: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? null;
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
                                    'msg' => "Bạn đã order comment sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-post-speed',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'sub-vip') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'sub-vip',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->subVip($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data subVip: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? null;
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
                                    'msg' => "Bạn đã order sub vip với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-post-speed',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'sub-quality') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'sub-quality',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->subQuality($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data subQuality: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? null;
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
                                    'msg' => "Bạn đã order sub quality với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'sub-quality',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'sub-sale') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'sub-sale',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->subSale($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data subSale: ' . json_encode($result['data']));
                                $link_post = $result['data']['link_post'] ?? $result['data']['idfb'] ?? null;
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
                                    'msg' => "Bạn đã order sub sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'sub-sale',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'sub-speed') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'sub-speed',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->subSpeed($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data subSpeed: ' . json_encode($result['data']));
                                $link_post = $result['data']['idfb'];
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
                                    'msg' => "Bạn đã sub speed sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'sub-sale',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'like-page-quality') {
                $validator = Validator::make($request->all(), [
                    'idpage' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-page-quality',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpage = $request->idpage;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->likePageQuality($idpage, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data likePageQuality: ' . json_encode($result['data']));
                                $link_post = $result['data']['idpage'];
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order like page quality với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-page-quality',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'like-page-sale') {
                $validator = Validator::make($request->all(), [
                    'idpage' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-page-sale',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpage = $request->idpage;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->likePageSale($idpage, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data likePageSale: ' . json_encode($result['data']));
                                $link_post = $result['data']['idpage'] ?? null;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order like page sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-page-sale',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'like-page-speed') {
                $validator = Validator::make($request->all(), [
                    'idpage' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => 'like-page-speed',
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpage = $request->idpage;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->likePageSpeed($idpage, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data likePageSpeed: ' . json_encode($result['data']));
                                $link_post = $result['data']['idpage'] ?? null;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order like page sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => 'like-page-sale',
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'eye-live') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|numeric',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'minutes' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => $request->type,
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock * $request->minutes;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $minutes = $request->minutes;
                            $note = $request->note;
                            $result = $sgr->eyeLive($idpost, $server_order, $amount, $minutes, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data eyeLive: ' . json_encode($result['data']));
                                $link_post = $result['data']['idpost'] ?? $idpost ?? null;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order mat live sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => $request->type,
                                    'server' => $server_order,
                                    'time' => $minutes,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'view-video') {
                $validator = Validator::make($request->all(), [
                    'link_video' => 'required|string',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'minutes' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => $request->type,
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $request->minutes * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $link_video = $request->link_video;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $minutes = $request->minutes;
                            $note = $request->note;
                            $result = $sgr->viewVideo($link_video, $server_order, $amount, $minutes, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data viewVideo: ' . json_encode($result['data']));
                                $link_post = $link_video;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order view video với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => $request->type,
                                    'server' => $server_order,
                                    'time' => $minutes,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'share-profile') {
                $validator = Validator::make($request->all(), [
                    'uid' => 'required|string',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => $request->type,
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->uid;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->shareProfile($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data shareProfile: ' . json_encode($result['data']));
                                $link_post = $idpost;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order mat live sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => $request->type,
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'member-group') {
                $validator = Validator::make($request->all(), [
                    'idgroup' => 'required|string',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => $request->type,
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idgroup = $request->idgroup;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->memberGroup($idgroup, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data memberGroup: ' . json_encode($result['data']));
                                $link_post = $idgroup;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order mat live sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => $request->type,
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'view-story') {
                $validator = Validator::make($request->all(), [
                    'idstory' => 'required|string',
                    'server_order' => 'required|string',
                    'count' => 'required|numeric',
                    'note' => 'string',
                    'url' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'msg' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = ServicePack::where([
                        'type_server' => 'facebook',
                        'code_server' => $request->type,
                        'server_service' => $request->server_order,
                        'api_service' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'msg' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'msg' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->count * $server->price_stock;
                        if ($total_money > $user->price) {
                            return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $oldMonetUser = $user->price;
                            $money_user = $user->price - $total_money;
                            $sgr = new FacebookSGRController();
                            $idstory = $request->idstory;
                            $server_order = $request->server_order;
                            $amount = $request->count;
                            $note = $request->note;
                            $result = $sgr->viewStory($idstory, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'msg' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                Log::info('data viewStory: ' . json_encode($result['data']));
                                $link_post = $idstory;
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
                                    'uid' => $link_post,
                                    'msg' => "Bạn đã order mat live sale với số lượng $amount tổng tiền $total_money",
                                    'price' => $total_money,
                                    'price_current' => $oldMonetUser,
                                    'price_left' => $user->price,
                                    'type' => $request->type,
                                    'server' => $server_order,
                                    'time' => null,
                                    'site' => "like",
                                    'original' => $startWith,
                                    'present' => 0,
                                    'order_id' => $id_order,
                                    'order_code' => $code_order,
                                    'type_service' => md5($type_service),
                                    'note' => $note,
                                    'status' => -1,
                                    'refund_count' => 0,
                                    'refund_subtraction' => 0,
                                    'other' => null,
                                    'identity_website' => config('license.domain'),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            }
                        }
                    }
                }
            } else {
                return response()->json(['status' => 0, 'msg' => 'Không tìm thấy dịch vụ này'], 201);
            }
        }
        return response()->json(['status' => false, 'msg' => 'Chức năng này đang được cập nhật'], 201);
    }

    public function instagram(Request $request, $type)
    {
        $api_token = $request->header('Api-Token');
        $id_order = Str::random(15);
        if (empty($api_token)) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Api-token phải bắt buộc'
            ]);
        }
        $user = User::where('api', $api_token)->first();
        if (empty($user)) {
            return response()->json(['status' => 0, 'msg' => 'Api-Token này không tồn tại']);
        }
        $arrayValidate = [
            'server_order' => 'required|string',
            'count' => 'required|numeric|min:1',
            'note' => 'string',
        ];
        $codeServer = strtolower($type);
        if ($codeServer == 'like-instagram') {
            $arrayValidate['link_post'] = 'required|string';
            $codeServerSGR = 'like-instagram';
            $idPost = $request->input('link_post');
        } elseif ($codeServer == 'follow-instagram') {
            $arrayValidate['username'] = 'required|string';
            $codeServerSGR = 'follow-instagram';
            $idPost = $request->input('username');
        } else {
            return response()->json(['status' => false, 'msg' => 'Không tìm thấy dịch vụ']);
        }
        $validator = Validator::make($request->all(), $arrayValidate);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'msg' => $validator->errors()->first()]);
        } else {
            $serverService = $request->input('server_order');
            $server = $this->findServer('instagram', $codeServerSGR, $serverService);
            if (empty($server)) {
                return response()->json(['status' => false, 'msg' => 'Mã server không tồn tại']);
            } elseif ($server->status_server == 'off') {
                return response()->json(['status' => false, 'msg' => 'Mã server đang tạm ngưng']);
            } else {
                $total_money = $request->input('count') * $server->price_stock;
                if ($total_money > $user->price) {
                    return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                } else {
                    $oldMonetUser = $user->price;
                    $money_user = $user->price - $total_money;
                    $sgr = new InstagramSGRController();
                    $server_order = $serverService;
                    $amount = $request->input('count');
                    $note = $request->input('note');
                    if ($codeServerSGR === 'like-instagram') {
                        $result = $sgr->likePost($idPost, $server_order, $amount, $note);
                    } else {
                        $result = $sgr->sub($idPost, $server_order, $amount, $note);
                    }
                    if ($result && !$result['status']) {
                        return response()->json(['status' => false, 'msg' => $result['message']], 201);
                    } elseif ($result && $result['status']) {
                        Log::info('data instagram: ' . json_encode($result['data']));
                        $link_post = $idPost;
                        $code_order = $result['data']['code_order'];
                        $startWith = $result['data']['start'];
                        $type_service = 'subgiare' . 'twitter';
                        $user->price = $money_user;
                        $user->save();
                        $message = "Bạn đã order dịch vụ $codeServerSGR với số lượng $amount tổng tiền $total_money";
                        $this->createHistory($amount, $user, $link_post, $message, $total_money, $oldMonetUser, $codeServerSGR, $server_order, $startWith, $id_order, $code_order, $type_service, $note);
                        return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order]);
                    }
                }
            }
        }
    }

    public function findServer($typeServer, $codeServer, $serverService, $apiService = 'subgiare')
    {
        return ServicePack::where([
            'type_server' => $typeServer,
            'code_server' => $codeServer,
            'server_service' => $serverService,
            'api_service' => $apiService
        ])->first();
    }

    public function createHistory($amount, $user, $link_post, $message, $total_money, $oldMonetUser, $type, $server_order, $startWith, $id_order, $code_order, $type_service, $note, $minutes = null)
    {
        History::create([
            'admin_note' => null,
            'count' => $amount,
            'data' => "",
            'user_id' => $user->id,
            'link' => $link_post,
            'username' => $user->username,
            'math' => "-",
            'uid' => $link_post,
            'msg' => $message,
            'price' => $total_money,
            'price_current' => $oldMonetUser,
            'price_left' => $user->price,
            'type' => $type,
            'server' => $server_order,
            'time' => $minutes,
            'site' => "like",
            'original' => $startWith,
            'present' => 0,
            'order_id' => $id_order,
            'order_code' => $code_order,
            'type_service' => md5($type_service),
            'note' => $note,
            'status' => -1,
            'refund_count' => 0,
            'refund_subtraction' => 0,
            'other' => null,
            'identity_website' => config('license.domain'),
            'created_at' => Carbon::now(),
        ]);
    }

    public function twitter(Request $request, $type)
    {
        $api_token = $request->header('Api-Token');
        $id_order = Str::random(15);
        if (empty($api_token)) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Api-token phải bắt buộc'
            ]);
        }
        $user = User::where('api', $api_token)->first();
        if (empty($user)) {
            return response()->json(['status' => 0, 'msg' => 'Api-Token này không tồn tại']);
        }
        $arrayValidate = [
            'server_order' => 'required|string',
            'count' => 'required|numeric|min:1',
            'note' => 'string',
        ];
        $codeServer = strtolower($type);
        if ($codeServer == 'like-twitter') {
            $arrayValidate['link_post'] = 'required|string';
            $codeServerSGR = 'like-twitter';
            $idPost = $request->input('link_post');
        } elseif ($codeServer == 'follow-twitter') {
            $arrayValidate['username'] = 'required|string';
            $codeServerSGR = 'sub-twitter';
            $idPost = $request->input('username');
        } else {
            return response()->json(['status' => false, 'msg' => 'Không tìm thấy dịch vụ']);
        }
        $validator = Validator::make($request->all(), $arrayValidate);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'msg' => $validator->errors()->first()]);
        } else {
            $serverService = $request->input('server_order');
            $server = $this->findServer('twitter', $codeServerSGR, $serverService);
            if (empty($server)) {
                return response()->json(['status' => false, 'msg' => 'Mã server không tồn tại']);
            } elseif ($server->status_server == 'off') {
                return response()->json(['status' => false, 'msg' => 'Mã server đang tạm ngưng']);
            } else {
                $total_money = $request->input('count') * $server->price_stock;
                if ($total_money > $user->price) {
                    return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                } else {
                    $oldMonetUser = $user->price;
                    $money_user = $user->price - $total_money;
                    $sgr = new TwitterSGRController();
                    $server_order = $serverService;
                    $amount = $request->input('count');
                    $note = $request->input('note');
                    if ($codeServerSGR === 'like-twitter') {
                        $result = $sgr->likePost($idPost, $server_order, $amount, $note);
                    } else {
                        $result = $sgr->sub($idPost, $server_order, $amount, $note);
                    }
                    if ($result && !$result['status']) {
                        return response()->json(['status' => false, 'msg' => $result['message']], 201);
                    } elseif ($result && $result['status']) {
                        Log::info('data twitter: ' . json_encode($result['data']));
                        $link_post = $idPost;
                        $code_order = $result['data']['code_order'];
                        $startWith = $result['data']['start'];
                        $type_service = 'subgiare' . 'twitter';
                        $user->price = $money_user;
                        $user->save();
                        $message = "Bạn đã order dịch vụ $codeServerSGR với số lượng $amount tổng tiền $total_money";
                        $this->createHistory($amount, $user, $link_post, $message, $total_money, $oldMonetUser, $codeServerSGR, $server_order, $startWith, $id_order, $code_order, $type_service, $note);
                        return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order]);
                    }
                }
            }
        }
    }

    public function tiktok(Request $request, $type)
    {
        $api_token = $request->header('Api-Token');
        $id_order = Str::random(15);
        if (empty($api_token)) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Api-token phải bắt buộc'
            ]);
        }
        $user = User::where('api', $api_token)->first();
        if (empty($user)) {
            return response()->json(['status' => 0, 'msg' => 'Api-Token này không tồn tại']);
        }
        $arrayValidate = [
            'server_order' => 'required|string',
            'count' => 'required|numeric|min:1',
            'note' => 'string',
        ];
        $codeServer = strtolower($type);
        if (in_array($codeServer, ['like-tiktok', 'comment-tiktok', 'share-tiktok', 'view-tiktok'])) {
            $arrayValidate['link_post'] = 'required|string';
            $idPost = $request->input('link_post');
        } elseif (in_array($codeServer, ['sub-tiktok', 'eye-live-tiktok'])) {
            $arrayValidate['username'] = 'required|string';
            if ($codeServer === 'eye-live-tiktok') {
                $arrayValidate['minutes'] = 'required|numeric|min:0';
            }
            $idPost = $request->input('username');
        } else {
            return response()->json(['status' => false, 'msg' => 'Không tìm thấy dịch vụ']);
        }
        $validator = Validator::make($request->all(), $arrayValidate);
        $codeServerSGR = $codeServer;
        if ($validator->fails()) {
            return response()->json(['status' => false, 'msg' => $validator->errors()->first()]);
        } else {
            $serverService = $request->input('server_order');
            $server = $this->findServer('tiktok', $codeServerSGR, $serverService);
            if (empty($server)) {
                return response()->json(['status' => false, 'msg' => 'Mã server không tồn tại']);
            } elseif ($server->status_server == 'off') {
                return response()->json(['status' => false, 'msg' => 'Mã server đang tạm ngưng']);
            } else {
                $total_money = $request->input('count') * $server->price_stock * $request->minutes;
                if ($total_money > $user->price) {
                    return response()->json(['status' => false, 'msg' => 'Tài khoản của bạn không đủ tiền'], 201);
                } else {
                    $oldMonetUser = $user->price;
                    $money_user = $user->price - $total_money;
                    $sgr = new TikTokSGRController();
                    $server_order = $serverService;
                    $amount = $request->input('count');
                    $note = $request->input('note');
                    switch ($codeServerSGR) {
                        case 'like-tiktok':
                        default:
                            $result = $sgr->like($idPost, $server_order, $amount, $note);
                            break;
                        case 'comment-tiktok':
                            $result = $sgr->comment($idPost, $server_order, $amount, $note);
                            break;
                        case 'share-tiktok':
                            $result = $sgr->share($idPost, $server_order, $amount, $note);
                            break;
                        case 'sub-tiktok':
                            $result = $sgr->sub($idPost, $server_order, $amount, $note);
                            break;
                        case 'view-tiktok':
                            $result = $sgr->view($idPost, $server_order, $amount, $note);
                            break;
                        case 'eye-live-tiktok':
                            $minutes = $request->input('minutes', 0);
                            $result = $sgr->eye($idPost, $server_order, $amount, $minutes, $note);
                            break;
                    }
                    if ($result && !$result['status']) {
                        return response()->json(['status' => false, 'msg' => $result['message']], 201);
                    } elseif ($result && $result['status']) {
                        Log::info('data tiktok: ' . json_encode($result['data']));
                        $link_post = $idPost;
                        $code_order = $result['data']['code_order'];
                        $startWith = $result['data']['start'];
                        $type_service = 'subgiare' . 'tiktok';
                        $user->price = $money_user;
                        $user->save();
                        $message = "Bạn đã order dịch vụ $codeServerSGR với số lượng $amount tổng tiền $total_money";
                        $this->createHistory($amount, $user, $link_post, $message, $total_money, $oldMonetUser, $codeServerSGR, $server_order, $startWith, $id_order, $code_order, $type_service, $note);
                        return response()->json(['status' => 1, 'msg' => "Đã mua đơn hàng này thành công", "code_order" => $id_order]);
                    }
                }
            }
        }
    }
}
