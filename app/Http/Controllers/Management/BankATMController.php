<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Banker;
use App\Models\Payment;
use Illuminate\Http\Request;

class BankATMController extends Controller
{
    public function index()
    {
        $listBanker = Banker::select([
            'id',
            'bank_code',
            'bank_name',
            'account_number',
            'card_holder',
            'url_image',
        ])
            ->get();
        return view('management.pages.recharge.atm.index', compact('listBanker'));
    }

    public function ajaxGetBankHistory(Request $request)
    {
        // Lấy các tham số từ AJAX request
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $searchValue = $request->input('search.value');
        $orderColumn = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $user = auth()->user();

        $query = Payment::query();
        // Áp dụng các điều kiện tìm kiếm nếu cần
        if (!empty($searchValue)) {
            $query->where('note', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%')
                ->orWhere('extra', 'like', '%' . $searchValue . '%');
        }
        // if (!empty($keyword)) {
        //     $query->where('username', 'like', '%' . $keyword . '%');
        // }

        $query->where('user_id', $user->id);
        // Sắp xếp dữ liệu
        $query->orderBy($orderColumn, $orderDir);
        // Lấy tổng số bản ghi trước khi áp dụng phân trang
        $totalRecords = $query->count();
        // Áp dụng phân trang
        $query->offset($start)->limit($length);
        // Lấy dữ liệu cuối cùng
        $data = $query->get();
        // Chuyển định dạng dữ liệu theo yêu cầu
        $formattedData = [
            'aaData' => $data,
            'iTotalDisplayRecords' => $totalRecords,
            'iTotalRecords' => $totalRecords,
        ];
        return response()->json($formattedData);
    }
}
