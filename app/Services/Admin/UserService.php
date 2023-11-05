<?php

namespace App\Services\Admin;

use App\Models\User;

class UserService
{
    protected $paymentService;

    /**
     * @param PaymentService $paymentService
     */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function getUsers($start, $length, $orderBy, $orderDir, $keyword)
    {
        $query = User::query();
        // Áp dụng các điều kiện tìm kiếm nếu cần
        if (!empty($keyword)) {
            $query->where('username', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
        // Sắp xếp dữ liệu
        $query->orderBy($orderBy, $orderDir);
        // Lấy tổng số bản ghi trước khi áp dụng phân trang
        $totalRecords = $query->count();
        // Áp dụng phân trang
        $query->offset($start)->limit($length);
        // Lấy dữ liệu cuối cùng
        return $query->get();
    }

    public function addMoneyToUser(User $user, $amount, $note)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Số tiền không hợp lệ');
        }
        $user->price += $amount;
        $user->all_money += $amount;
        $user->save();
        // ghi log vào payment
        $paymentData = [
            'identity_website' => config('license.domain'),
            'user_id' => $user->id,
            'username' => $user->username,
            'price' => $amount,
            'time' => now(),
            'note' => $note,
            'user_read' => 0,
            'is_auto' => 0,
        ];
        $this->paymentService->createPayment($paymentData);
        return $user;
    }

    public function subtractMoneyToUser(User $user, $amount, $note)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Số tiền không hợp lệ');
        }

        if ($amount > $user->price) {
            throw new \InvalidArgumentException('Không thể trừ âm tài khoản');
        }
        $user->price -= $amount;
        $user->save();
        $paymentData = [
            'identity_website' => config('license.domain'),
            'user_id' => $user->id,
            'username' => $user->username,
            'price' => 0 - $amount,
            'time' => now(),
            'note' => $note,
            'user_read' => 0,
            'is_auto' => 0,
        ];
        $this->paymentService->createPayment($paymentData);
        return $user;
    }

    public function getUsersWithFormat($timeFrom, $timeTo)
    {
        $timeFrom = date('Y-m-d H:i:s', strtotime($timeFrom));
        $timeTo = date('Y-m-d H:i:s', strtotime($timeTo));

        return User::whereBetween('created_at', [$timeFrom, $timeTo])
            ->groupBy('username', 'email', 'phone', 'ugroup', 'created_at')
            ->get();
    }

    public function upgradeUser($user_id, $ugroup)
    {
        $user = User::find($user_id);

        if (!$user) {
            throw new \InvalidArgumentException("Người dùng không tồn tại");
        }

        // Cập nhật giá trị ugroup của người dùng
        $user->ugroup = $ugroup;
        $user->save();
    }
}
