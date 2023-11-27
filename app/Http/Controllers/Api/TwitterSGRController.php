<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use GuzzleHttp\Client;

class TwitterSGRController extends Controller
{
    protected $token;
    public function __construct()
    {
        $this->middleware('XSS');
        $token = Setting::select('token_subgiare')->first()->toArray();
        $this->token = $token['token_subgiare'];
    }

    public function likePost($link_post, $server_order, $amount, $note = null){
        $url = "https://thuycute.hoangvanlinh.vn/api/service/twitter/like/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_post' => $link_post,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function sub($username, $server, $amount, $note = null){
        $url = "https://thuycute.hoangvanlinh.vn/api/service/twitter/sub/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'username' => $username,
                'server_order' => $server,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function headers(){
        $headers = [
            'Accept' => '*/*',
            'Api-token' => $this->token,
            'Content-Type' => 'application/x-www-form-urlencoded',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36',
        ];
        return $headers;
    }
}
