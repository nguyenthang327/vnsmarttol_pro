<?php

namespace App\Services\Bank;

use App\Helpers\InforWebHelper;
use App\Models\Banker;
use App\Models\BankHistory;
use App\Models\History;
use App\Models\User;
use Exception;
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

            $data = [];
            $data = $result['data'];
            $soluong =  count($data);

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

                        $cashto = $user->all_money;
                        $usercheck3b = $user->username;
                        $create = $user->cheat;

                        // check mã giao dịch đẫ tồn tại hay chưa
                        $bankHistory = BankHistory::where('username', $usercheck3b)->where('trans', $magd)->where('type', $type)->first();
                        if(!$bankHistory && $create == 'on'){
                            $cashmoi = $cashto + $amount;
                            $statusBank = BankHistory::STATUS_SUCCESS;
                            
                            // create lịch sử bank
                            BankHistory::create([
                                'user_id' => $user->id,
                                'username' => $usercheck3b,
                                'type' => $type,
                                'money' => $amount,
                                'trans' => $magd,
                                'note' => $noidung,
                                'status' => $statusBank,
                                'identity_website' => $domain,
                            ]);

                            // update all money
                            User::where('username', $usercheck3b)->update('all_money', $cashmoi);

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
