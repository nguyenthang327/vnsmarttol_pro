<?php

namespace App\Services\Admin;

use App\Models\Discount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class DiscountService
{
    public function getDiscounts($type, $start, $length, $orderBy, $orderDir, $keyword)
    {
        $query = Discount::query();
        if (!empty($type)) {
            if ($type == 'discount') {
                $query->where('code_type', 'discount');
            } elseif ($type == 'money_gift') {
                $query->where('code_type', 'money_gift');
            } else {
                $query->whereNotNull('code_type');
            }
        }
        if (!empty($keyword)) {
            $query->where('code', 'like', "%$keyword%");
        }
        if (!empty($orderBy) && !empty($orderDir)) {
            $query->orderBy($orderBy, $orderDir);
        }
        if (!empty($start) && !empty($length)) {
            $query->skip($start)->take($length);
        }
        return $query->get();
    }

    /**
     * @throws \Exception
     */
    public function addDiscount($id, $codes, $codeType, $discountPercent, $enable, $limitPerUser, $minOrder, $maxDiscount)
    {
        DB::beginTransaction();
        $messageError = "Đã xảy ra lỗi trong quá trình thêm mới";
        try {
            if ($id) {
                $discount = Discount::find($id);
                if (!$discount) {
                    $messageError = "Không tồn tại mã giảm giá đã nhập";
                    throw new \Exception();
                }
                if (!$this->codeExists($codes[0])) {
                    $discount->update([
                        'code' => $codes[0], // Cập nhật chỉ mã đầu tiên
                        'discount_percent' => $discountPercent,
                        'enable' => $enable,
                        'limit_per_user' => $limitPerUser,
                        'min_order' => $minOrder,
                        'max_discount' => $maxDiscount,
                    ]);
                } else {
                    $messageError = "Mã code {$codes[0]} đã tồn tại!";
                    throw new Exception();
                }

            } else {
                foreach ($codes as $code) {
                    if (!$this->codeExists($code)) {
                        if ($codeType == 'money_gift') {
                            Discount::create([
                                'code' => $code,
                                'code_type' => 'money_gift',
                                'discount_percent' => null,
                                'enable' => $enable,
                                'limit_per_user' => $limitPerUser,
                                'min_order' => null,
                                'max_discount' => $maxDiscount,
                            ]);
                        } else {
                            Discount::create([
                                'code' => $code,
                                'code_type' => $codeType,
                                'discount_percent' => $discountPercent,
                                'enable' => $enable,
                                'limit_per_user' => $limitPerUser,
                                'min_order' => $minOrder,
                                'max_discount' => $maxDiscount,
                            ]);
                        }
                    } else {
                        $messageError = "Mã code {$code} đã tồn tại!";
                        throw new Exception();
                    }
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('[DiscountService][addDiscount] error:' . $e->getMessage());
            throw new \Exception($messageError);
        }
    }

    public function getDiscountById($id)
    {
        return Discount::find($id);
    }

    /**
     * @throws \Exception
     */
    public function deleteDiscount($id)
    {
        $discount = $this->getDiscountById($id);

        if (!$discount) {
            throw new \Exception("Không tìm thấy mã giảm giá");
        }

        $discount->delete();
    }

    public function codeExists($code)
    {
        return Discount::where('code', $code)->exists();
    }
}
