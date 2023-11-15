<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePack;
use App\Models\Setting;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function facebookIndex()
    {
        $settings = Setting::select('token_subgiare')->first();
        if (empty($settings) || empty($settings->token_subgiare)) {
            return redirect()->route('admin.setting.index');
        }
        return view('admin.pages.services.facebook');
    }

    public function ajaxGetServices(Request $request)
    {
        $type = $request->input('type');
        // Lấy dữ liệu từ request
        $start = $request->input('start');
        $length = $request->input('length');
        $order_by = $request->input('order_by');
        $order_dir = $request->input('order_dir');
        // Thực hiện truy vấn dựa trên thông tin từ request
        $query = ServicePack::query();
        $query->where(['type_server' => $type, 'api_service' => 'subgiare']);
        $query->orderBy($order_by, $order_dir);
        $subGiaRe = $query->skip($start)->take($length)->get();
        // Định dạng dữ liệu trả về
        $result = [
            'aaData' => $subGiaRe,
            'iTotalDisplayRecords' => $subGiaRe->count(),
            'iTotalRecords' => ServicePack::where(['type_server' => $type, 'api_service' => 'subgiare'])->count(),
        ];
        // Trả về dữ liệu dưới định dạng JSON
        return response()->json($result);
    }
}
