<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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
                'redirect' => '/qladmin/user'
            ]);
        }catch (\Exception $e) {
            Log::error("File: " . $e->getFile() . '---Line: ' . $e->getLine() . "---Message: " . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => 'Thêm thành viên thất bại, vui lòng kiểm tra lại thông tin.'
            ]);
        }
    }

    public function show(Request $request)
    {
        $userId = $request->input('user_id');
        try {
            // Thực hiện lấy thông tin người dùng từ cơ sở dữ liệu
            $user = User::find($userId); // Thay $userId bằng id người dùng cụ thể

            if (!$user) {
                throw new \Exception('Người dùng không tồn tại'); // Ném ra lỗi nếu không tìm thấy người dùng
            }

            // Trả về dữ liệu thành công
            return response()->json([
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Xử lý lỗi và trả về định dạng yêu cầu
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }
    public function update(Request $request)
    {
        $data = $request->all();
        try {
            $user = User::find($data['id']);

            if (!$user) {
                throw new \Exception('Thành viên không tồn tại');
            }
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->full_name = $data['full_name'];
            $user->phone = $data['phone'];
            $user->facebook = $data['facebook'];
            $user->spin_count = $data['spin_count'];
            $user->ugroup = $data['ugroup'];
            $user->status = $data['status'];
            $user->reason = $data['reason'];
            if ($data['password']) {
                $user->password = bcrypt($data['password']);
            }
            $user->save();
            return response()->json([
                'status' => 1,
                'msg' => 'Cập nhật thành viên thành công',
                'redirect' => '/qladmin/user'
            ]);
        } catch (\Exception $e) {
            // Xử lý lỗi và trả về định dạng yêu cầu
            return response()->json(['status' => 0, 'msg' => $e->getMessage()]);
        }
    }
}