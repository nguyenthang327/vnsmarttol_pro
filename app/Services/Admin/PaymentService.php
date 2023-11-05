<?php

namespace App\Services\Admin;

use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentService
{
    public function createPayment($data)
    {
        return Payment::create($data);
    }

    public function getPayments($mode, $source, $start, $length, $orderBy, $orderDir, $keyword)
    {
        $query = Payment::query();
        if (!empty($mode)) {
            if ($mode == 'manual') {
                $query->where('is_auto', 0);
            } elseif ($mode == 'auto') {
                $query->where('is_auto', 1);
            } else {
                $query->whereNotNull('is_auto');
            }
        }
        if (!empty($source) && $source != 'all') {
            $query->where('payment_source', 'like', "%$source%");
        }
        if (!empty($keyword)) {
            $query->where('username', 'like', "%$keyword%");
        }
        if (!empty($orderBy) && !empty($orderDir)) {
            $query->orderBy($orderBy, $orderDir);
        }
        if (!empty($start) && !empty($length)) {
            $query->skip($start)->take($length);
        }
        $payments = $query->get();
        return $payments;
    }

    public function findRepeatedPayments($paymentDate)
    {
        $payments = Payment::whereDate('time', date('Y-m-d', strtotime($paymentDate)))
            ->orderBy('time') // Sắp xếp theo thời gian thanh toán
            ->get(); // Lấy danh sách id của thanh toán liên tiếp
        $consecutivePayments = [];
        foreach ($payments as $payment) {
            $isConsecutive = false;
            foreach ($payments as $otherPayment) {
                if ($payment->id !== $otherPayment->id) {
                    if (
                        $payment->price === $otherPayment->price &&
                        strtotime($otherPayment->time) - strtotime($payment->time) <= 60
                    ) {
                        $isConsecutive = true;
                        break;
                    }
                }
            }
            if ($isConsecutive) {
                $consecutivePayments[] = $payment;
            }
        }
        // TODO: check front-end date == now() ??
        return PaymentResource::collection($consecutivePayments);
    }

    public function findDuplicatePayments($paymentDate)
    {
        $startDateTime = Carbon::parse($paymentDate)->startOfDay();
        $endDateTime = Carbon::parse($paymentDate)->endOfDay();
        $duplicatePaymentIds = Payment::whereBetween('time', [$startDateTime, $endDateTime])
            ->groupBy('user_id', 'price')
            ->havingRaw('COUNT(*) > 1')
            ->selectRaw('GROUP_CONCAT(id) as id_list')
            ->get();
        $duplicatePayments = [];
        if (!empty($duplicatePaymentIds) && isset($duplicatePaymentIds[0]['id_list'])) {
            // Lấy thông tin chi tiết của các thanh toán
            $idArray = explode(',', $duplicatePaymentIds[0]['id_list']);
            $duplicatePayments = Payment::whereIn('id', $idArray)->get();
        }
        return PaymentResource::collection($duplicatePayments);
    }
}
