<?php

namespace App\Http\Controllers\Management\Services;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\ServicePack;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{

    public function __construct()
    {
        $this->middleware('XSS');
    }

    /**
     * @param Request $request
     * @param $type
     * @return Application|Factory|View|never
     */
    public function index(Request $request, $type)
    {
        switch ($type) {
            case 'like-twitter':
                $title = "Like bài viết Twitter";
                $code = "like-twitter";
                break;
            case 'follow-twitter':
                $title = "Theo dõi tài khoản Twitter";
                $code = "sub-twitter";
                break;
            default:
                abort(404);
        }

        $servers = ServicePack::where([
            'type_server' => 'twitter',
            'code_server' => $code,
            'api_service' => 'subgiare'
        ])->get();

        $counts = [];

        foreach (ServicePack::SERVICE_PACK_STATUS as $status) {
            $statusNumber = $this->getStatusNumber($status);
            $counts[$status] = History::when($statusNumber !== null, function ($query) use ($statusNumber) {
                return $query->where('user_id', Auth::id())->where('status', $statusNumber);
            })->count();
        }

        $counts['all'] = History::where('user_id', Auth::id())->count();

        return view("management.pages.services.twitter.index", [
            'title' => $title,
            'servers' => $servers,
            'type' => $type,
            'counts' => $counts
        ]);
    }

    protected function getStatusNumber($status)
    {
        switch ($status) {
            case 'success':
                return 1;
            case 'start':
                return 0;
            case 'error':
                return 10;
            default:
                return -1; // Trạng thái mặc định hoặc không xác định
        }
    }
}
