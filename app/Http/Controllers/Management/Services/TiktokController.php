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

class TiktokController extends Controller
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
            case 'like-tiktok':
                $title = "Like Tiktok";
                $code = "like-tiktok";
                break;
            case 'comment-tiktok':
                $title = "Comment Tiktok";
                $code = "comment-tiktok";
                break;
            case 'share-tiktok':
                $title = "Share Tiktok";
                $code = "share-tiktok";
                break;
            case 'sub-tiktok':
                $title = "Follow Tiktok";
                $code = "sub-tiktok";
                break;
            case 'view-tiktok':
                $title = "View Tiktok";
                $code = "view-tiktok";
                break;
            case 'eye-live-tiktok':
                $title = "Mắt live Tiktok";
                $code = "eye-live-tiktok";
                break;
            default:
                abort(404);
        }
        $servers = ServicePack::where([
            'type_server' => 'tiktok',
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
        return view("management.pages.services.tiktok.index", [
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
                return -1;
        }
    }
}
