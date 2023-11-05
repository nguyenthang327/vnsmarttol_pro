<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Services\Admin\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return view('admin.pages.payments.index');
    }

    public function ajaxGetPayments(Request $request)
    {
        $mode = $request->input('mode');
        $source = $request->input('source');
        $start = $request->input('start');
        $length = $request->input('length');
        $orderBy = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $payments = $this->paymentService->getPayments($mode, $source, $start, $length, $orderBy, $orderDir, $keyword);
        $formattedPayments = PaymentResource::collection($payments);
        $result = [
            'aaData' => $formattedPayments,
            'iTotalDisplayRecords' => count($formattedPayments),
            'iTotalRecords' => count($formattedPayments),
        ];
        return response()->json($result);
    }

    public function findRepeatedPayments(Request $request)
    {
        try {
            $paymentDate = $request->input('payment_date');
            // Thực hiện logic để tìm kiếm thanh toán liên tiếp
            $repeatedPayments = $this->paymentService->findRepeatedPayments($paymentDate);
            $response = [
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'data' => $repeatedPayments,
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            $errorResponse = [
                'status' => 0,
                'msg' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'data' => [],
            ];
            return response()->json($errorResponse);
        }
    }

    public function findDuplicatePayments(Request $request)
    {
        try {
            $paymentDate = $request->input('payment_date');
            $duplicatePayments = $this->paymentService->findDuplicatePayments($paymentDate);
            $response = [
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'data' => $duplicatePayments,
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            $errorResponse = [
                'status' => 0,
                'msg' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'data' => [],
            ];
            return response()->json($errorResponse);
        }
    }
}
