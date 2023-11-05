<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function ajaxGetUsers(Request $request)
    {
        // Lấy các tham số từ AJAX request
        $start = $request->input('start');
        $length = $request->input('length');
        $orderBy = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $users = $this->userService->getUsers($start, $length, $orderBy, $orderDir, $keyword);
        $formattedUsers = UserResource::collection($users);
        $result = [
            'aaData' => $formattedUsers,
            'iTotalDisplayRecords' => count($formattedUsers),
            'iTotalRecords' => count($formattedUsers),
        ];
        return response()->json($result);
    }

    public function create(UserRequest $request)
    {
        try {
            // Lấy các dữ liệu được kiểm tra qua request
            $data = $request->validated();
            $apiKey = StringHelper::generateAPI();
            $agent = InforWebHelper::getAgent();
            $domain = config('license.domain');
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
        } catch (\Exception $e) {
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
            $user = User::find($userId);
            if (!$user) {
                throw new \Exception('Thành viên không tồn tại'); // Ném ra lỗi nếu không tìm thấy người dùng
            }
            // Trả về dữ liệu thành công
            return response()->json([
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            // Xử lý lỗi
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

    public function addPrice()
    {
        $getAllUsers = User::select(['id', 'username', 'price'])->get();
        return view('admin.pages.users.add_price', [
            'users' => $getAllUsers
        ]);
    }

    public function addMoney(Request $request, UserService $userService)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'note' => 'string|nullable',
        ]);
        $user = User::find($request->input('user_id'));
        $amount = $request->input('amount');
        $note = $request->input('note');
        try {
            $updatedUser = $userService->addMoneyToUser($user, $amount, $note);
            if ($updatedUser) {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Thêm thanh toán thành công',
                    'redirect' => '/qladmin/payment/'
                ]);
            } else {
                throw new \InvalidArgumentException('Có lỗi xảy ra trong quá trình thêm thanh toán');
            }

        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage()
            ]);
        }
    }

    public function subtractPrice()
    {
        $getAllUsers = User::select(['id', 'username', 'price'])->get();
        return view('admin.pages.users.subtract_price', [
            'users' => $getAllUsers
        ]);
    }

    public function subtractMoney(Request $request, UserService $userService)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'note' => 'string|nullable',
        ]);
        $user = User::find($request->input('user_id'));
        $amount = $request->input('amount');
        $note = $request->input('note');
        try {
            $updatedUser = $userService->subtractMoneyToUser($user, $amount, $note);
            if ($updatedUser) {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Thao tác thành công',
                    'redirect' => '/qladmin/payment/'
                ]);
            } else {
                throw new \InvalidArgumentException('Có lỗi xảy ra trong quá trình thao tác');
            }

        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage()
            ]);
        }
    }

    public function upgrade()
    {
        $getAllUsers = User::select(['id', 'username', 'price', 'all_money', 'ugroup'])->get();
        return view('admin.pages.users.upgrade', [
            'users' => $getAllUsers
        ]);
    }

    public function upgradeUser(Request $request)
    {
        try {
            $user_id = $request->input('user_id');
            $ugroup = $request->input('ugroup');
            $this->userService->upgradeUser($user_id, $ugroup);
            return response()->json([
                "status" => 1,
                "msg" => "Nâng cấp thành viên thành công!",
                "redirect" => "/qladmin/user/"
            ]);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }

    public function export()
    {
        return view('admin.pages.users.export');
    }

    public function exportData(Request $request)
    {
        try {
            $timeFrom = $request->input('time_from');
            $timeTo = $request->input('time_to');
            $users = $this->userService->getUsersWithFormat($timeFrom, $timeTo);
            if ($users) {
                $formattedUsers = UserResource::collection($users);
                return response()->json([
                    "status" => 1,
                    "msg" => "OK",
                    "users" => $formattedUsers,
                ]);
            } else {
                throw new \InvalidArgumentException('Có lỗi xảy ra trong quá trình thao tác');
            }

        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage()
            ]);
        }
    }
}
