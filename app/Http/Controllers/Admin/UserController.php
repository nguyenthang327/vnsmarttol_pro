<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function ajaxGetUser(Request $request)
    {
        // Lấy các tham số từ AJAX request
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $searchValue = $request->input('search.value');
        $orderColumn = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $query = User::query();
        // Áp dụng các điều kiện tìm kiếm nếu cần
        if (!empty($searchValue)) {
            $query->where('username', 'like', '%' . $searchValue . '%')
                ->orWhere('email', 'like', '%' . $searchValue . '%');
        }
        if (!empty($keyword)) {
            $query->where('username', 'like', '%' . $keyword . '%');
        }
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

    public function create(UserRequest $request)
    {
        try {
            // Lấy các dữ liệu được kiểm tra qua request
            $data = $request->validated();
            $apiKey = StringHelper::generateAPI();
            $agent = InforWebHelper::getAgent();
            $domain = InforWebHelper::getDomain();
            // Tạo một user mới
            $client = User::create([
                'username' => strtolower($data['username']),
                'email' => $data['email'],
                'full_name' => $data['full_name'],
                'phone' => $data['phone'],
                'facebook' => $data['facebook'],
                'password' => bcrypt($data['password']),
                'ugroup' => $data['ugroup'],
                'api' => $apiKey,
                'cash' => 0,
                'status' => 1,
                'collaborator' => 0,
                'ip' => RegisterRequest::capture()->ip(),
                'device' => $agent,
                'cheat' => 'on',
                'identity_website' => $domain,
            ]);
            $role = Role::where('name', Role::ROLE_CLIENT)->first();
            if ($role) {
                $client->syncRoles([$role->id]);
            }
            return response()->json([
                'status' => 1,
                'msg' => 'Thêm thành viên thành công.',
                'redirect' => '/qladmin/user/'
            ]);
        }catch (\Exception $e) {
            Log::error("File: " . $e->getFile() . '---Line: ' . $e->getLine() . "---Message: " . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => 'Thêm thành viên thất bại, vui lòng kiểm tra lại thông tin.'
            ]);
        }
    }

}
