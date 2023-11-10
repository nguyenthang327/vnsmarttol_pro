<?php

namespace App\Services\Bank;

use App\Helpers\InforWebHelper;
use App\Models\Banker;
use App\Models\History;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BankService
{
    function hanldeBankCallback($path, $bankCode, $type, $typeHistory){
        try {
            $domain = InforWebHelper::getDomain();
            if (isset($_GET['domain'])) {
                $domain = trim($_GET['domain']);
            }

            # get data in banker table
            $bankerReceive = Banker::where('identity_website', $domain)->where('bank_code', $bankCode)->first();
            if (!$bankerReceive) {
                throw new Exception('[BankService][hanldeBankCallback] Ngân hàng nhận không có trong hệ thống');
            }

            $noidungvalue = strtolower($bankerReceive->note);
            $sotaikhoan = $bankerReceive->account_number;
            $password = $bankerReceive->password_bank;
            $token = $bankerReceive->token;
            $tygia = $bankerReceive->discount;
            $toithieu = $bankerReceive->min_bank - 1;

            $result = json_decode(Http::get("https://api.web2m.com/$path/$password/$sotaikhoan/$token"));

            if(!isset($result['data'])){
                throw new Exception('[BankService][hanldeBankCallback] call url: ' . $result["msg"]);
            }

            $data = [];
            $data = $result['data'];
            $soluong =  count($data);

            $setting = Setting::first(); // setting

            if ($soluong > 0) {
                for ($j = 0; $j < $soluong; $j++) {
                    $magd =  $data[$j]['refNo'];
                    $amount =  $data[$j]['creditAmount'] * $tygia / 100;
                    $noidung =  strtolower($data[$j]['description']);
                    if ($amount > $toithieu) {
                        $usercheck1var = explode("$noidungvalue", $noidung);
                        $usercheck1 = $usercheck1var['1'];
                        $usercheck2 =  explode(".", $usercheck1);
                        $usercheck3 = $usercheck2['0'];
                        $usercheck2 =  explode(" ", $usercheck3);
                        $usercheck3 = $usercheck2['0']; // ID of user

                        $user = User::where('id', $usercheck3)
                            ->where('identity_website', $domain)
                            ->first();  // check user exist

                        if (!$user) {
                            throw new Exception('[BankService][hanldeBankCallback] Không có đơn mới ' . $noidung);
                        }

                        $cashto = $user->price;
                        $usercheck3b = $user->username;
                        $create = $user->cheat;
                        $allMoney = $user->all_money;

            
                        // check mã giao dịch đẫ tồn tại hay chưa
                        $bankHistory = Payment::where('username', $usercheck3b)
                            ->where('trans', $magd)
                            ->where('payment_source', $type)
                            ->first();

                        if(!$bankHistory && $create == 'on'){
                            // process khuyến mãi
                            if(!empty($setting->offer_from) && !empty($setting->offer_to) && !empty($setting->offer_percent)){
                                $offerFrom = Carbon::parse($setting->offer_from);
                                $offerTo = Carbon::parse($setting->offer_to);
                                $now = Carbon::now();
                                if($offerFrom->lte($now) && $offerTo->gte($now)){
                                    $amount = $amount + ($amount*$setting->offer_percent)/100;
                                }
                            }

                            $cashmoi = $cashto + $amount;
                            $allMoney = $allMoney + $amount;

                            // create payment
                            Payment::create([
                                'user_id' => $user->id,
                                'username' => $usercheck3b,
                                'payment_source' => $type,
                                'note' => $noidung,
                                'user_read' => 0,
                                'is_auto' => 1,
                                'time' => Carbon::now()->format('Y-m-d H:i:s'),
                                'price' => $amount,
                                'auto_banks_id' => null,
                                'extra' => Banker::DATA_BANKER[$type] ?? null,
                            ]);

                            // History
                            History::create([
                                'user_id' => $user->id,
                                'username' => $usercheck3b,
                                'count' => 1,
                                'price' => $amount,
                                'price_current' =>  $cashto,
                                'price_left' => $cashmoi,
                                'math' => '+',
                                'type' => $typeHistory,
                                'note' => $noidung,
                                'status' => 1, // nạp thành công
                                'identity_website' => $domain,
                            ]);

                            $paramsUpdateUser = [
                                'price' => $cashmoi,
                                'all_money' => $allMoney
                            ];

                            // process ugroup of user
                            if($user->ugroup != User::GROUP_DISTRIBUTOR){
                                // lấy ra mốc nạp tiền cao nhất
                                $maxPrice = History::where('math', '+')
                                    ->where('user_id', $user->id)
                                    ->max('price');
                                if ($allMoney >= $setting->total_charge_lv3 && $maxPrice >= $setting->min_charge_lv3){
                                    $paramsUpdateUser['ugroup'] = User::GROUP_DISTRIBUTOR;
                                }else if ($allMoney >= $setting->total_charge_lv2 && $maxPrice >= $setting->min_charge_lv2){
                                    $paramsUpdateUser['ugroup'] = User::GROUP_AGENCY;
                                }else if($allMoney >= $setting->total_charge_lv1 && $maxPrice >= $setting->min_charge_lv1){
                                    $paramsUpdateUser['ugroup'] = User::GROUP_COLLABORATOR;
                                }
                            }

                            // update all money
                            User::where('username', $usercheck3b)->update($paramsUpdateUser);

                            Log::info('[BankService][hanldeBankCallback] Đã cộng tiền');
                        }else{
                            Log::info('[BankService][hanldeBankCallback] Đã cộng tiền rồi ' . $create);
                        }

                    } else {
                        throw new Exception('[BankService][hanldeBankCallback] Nạp tối thiểu ' . $amount);
                    }
                }
            } elseif ($soluong == 0) {
                throw new Exception('[BankService][hanldeBankCallback] Null');
            } else {
                throw new Exception('[BankService][hanldeBankCallback] Error');
            }
        } catch (Exception $e) {
            Log::error('[BankService][hanldeBankCallback] error:' . $e->getMessage());
            throw new Exception('[BankService][hanldeBankCallback] error ' . $e->getMessage());
        }
    }
}
