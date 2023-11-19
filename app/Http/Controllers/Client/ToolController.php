<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ToolController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    /**
     * @throws GuzzleException
     */
    public function getUID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'msg' => $validator->errors()->first()
            ], 200);
        }
        $url = "https://id.traodoisub.com/api.php";
        $headers = [
            "accept: application/json, text/javascript, */*; q=0.01"
        ];

        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'form_params' => [
                'link' => "https://www.facebook.com/" . $request->link
            ]
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        if (isset($data['error'])) {
            \Log::info($data['error']);
            return response()->json([
                'status' => 0,
                'msg' => "Hệ thống get uid lỗi, Vui lòng tự điền uid"
            ], 200);
        } else {
            return response()->json([
                "status" => 1,
                "msg" => "Thao tác thành công!",
                "data" => [
                    "id" => $data['id'],
                    "name" => "Facebook"
                ],
                "original" => 0
            ], 200);
        }
    }
}
