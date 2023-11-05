<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InforWebHelper;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigBankRequest;
use App\Models\Banker;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    public function index()
    {
        $data = Banker::select([
            'id',
            'bank_code',
            'bank_name',
            'account_number',
            'card_holder',
        ])
            ->get();

        return view('admin.pages.config.bank.index', compact('data'));
    }

    public function store(StoreConfigBankRequest $request)
    {
        try {
            $domain = InforWebHelper::getDomain();
            $params = [
                'bank_code' => $request->input('bank_code'),
                'bank_name' => $request->input('bank_name'),
                'card_holder' => $request->input('card_holder'),
                'account_number' => $request->input('account_number'),
                'note' => $request->input('note'),
                'min_bank' => $request->input('min_bank'),
                'discount' => $request->input('discount'),
                'password_bank' => $request->input('password_bank'),
                'token' => $request->input('token'),
                'identity_website' => $domain,
            ];

            // if bank_code = other thì không thực hiện cộng tiền tự động cho người dùng khi bank.
            if ($request->input('bank_code') == 'other') {
                $params['url_image'] = $request->input('url_image');
            } else {
                $params['url_image'] = StringHelper::getQRcodeLink($params['bank_code'], $params['account_number'], $params['bank_name'], $params['note']);
            }
            $data = Banker::create($params); // create ngân hàng thụ hưởng

            return response()->json([
                'status' => 1,
                'msg' => trans('message.success'),
                'data' => $data
            ]);
        } catch (Exception $e) {
            Log::error('[AdminBankController][store] error:' . $e->getMessage());
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        try {
            $data = Banker::where('id', $id)->first();
            if (!$data) {
                throw new \Exception('Ngân hàng không tồn tại'); // Ném ra lỗi nếu không tìm thấy ngân hàng
            }

            // Trả về dữ liệu thành công
            return response()->json([
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }

    public function update(StoreConfigBankRequest $request)
    {
        $id = $request->input('id');
        try {
            $data = Banker::where('id', $id)->first();
            if (!$data) {
                throw new \Exception('Ngân hàng không tồn tại'); // Ném ra lỗi nếu không tìm thấy ngân hàng
            }

            $domain = InforWebHelper::getDomain();
            $params = [
                'bank_code' => $request->input('bank_code'),
                'bank_name' => $request->input('bank_name'),
                'card_holder' => $request->input('card_holder'),
                'account_number' => $request->input('account_number'),
                'note' => $request->input('note'),
                'min_bank' => $request->input('min_bank'),
                'discount' => $request->input('discount'),
                'password_bank' => $request->input('password_bank'),
                'token' => $request->input('token'),
                'identity_website' => $domain,
            ];

            // if bank_code = other thì không thực hiện cộng tiền tự động cho người dùng khi bank.
            if ($request->input('bank_code') == 'other') {
                $params['url_image'] = $request->input('url_image');
            } else {
                $params['url_image'] = StringHelper::getQRcodeLink($params['bank_code'], $params['account_number'], $params['bank_name'], $params['note']);
            }

            $data->update($params);

            // Trả về dữ liệu thành công
            return response()->json([
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            $data = Banker::where('id', $id)->first();
            if (!$data) {
                throw new \Exception('Ngân hàng không tồn tại'); // Ném ra lỗi nếu không tìm thấy ngân hàng
            }

            $data->delete();

            // Trả về dữ liệu thành công
            return response()->json([
                'status' => 1,
                'msg' => 'Thao tác thành công!',
                'data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'msg' => $e->getMessage(),
            ]);
        }
    }
}
