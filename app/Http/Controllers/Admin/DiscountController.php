<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use App\Services\Admin\DiscountService;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function index()
    {
        return view('admin.pages.discounts.index');
    }

    public function ajaxGetDiscounts(Request $request)
    {
        $type = $request->input('type');
        $start = $request->input('start');
        $length = $request->input('length');
        $orderBy = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $discounts = $this->discountService->getDiscounts($type, $start, $length, $orderBy, $orderDir, $keyword);
        $formattedDiscounts = DiscountResource::collection($discounts);
        $result = [
            'aaData' => $formattedDiscounts,
            'iTotalDisplayRecords' => count($formattedDiscounts),
            'iTotalRecords' => count($formattedDiscounts),
        ];
        return response()->json($result);
    }

    public function store(DiscountRequest $request)
    {
        try {
            $id = $request->input('id');
            $code = $request->input('code');
            $codeType = $request->input('code_type');
            $discountPercent = $request->input('discount_percent');
            $enable = $request->input('enable');
            $limitPerUser = $request->input('limit_per_user');
            $minOrder = $request->input('min_order');
            $maxDiscount = $request->input('max_discount');
            $codes = explode('|', $code);
            $this->discountService->addDiscount($id, $codes, $codeType, $discountPercent, $enable, $limitPerUser, $minOrder, $maxDiscount);
            return response()->json([
                "status" => 1,
                "msg" => "Thao tác thành công!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }

    public function show(Request $request)
    {
        try {
            $id = $request->input('id');
            $discount = $this->discountService->getDiscountById($id);

            if (!$discount) {
                return response()->json([
                    "status" => 0,
                    "msg" => "Không tìm thấy mã giảm giá"
                ]);
            }
            $response = [
                'status' => 1,
                'msg' => 'OK',
                'data' => $discount,
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input('id');
            $this->discountService->deleteDiscount($id);
            $response = [
                'status' => 1,
                'msg' => 'OK'
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
