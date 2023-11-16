<?php

namespace App\Http\Controllers\Management\Services;

use App\Http\Controllers\Controller;
use App\Models\ServicePack;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FacebookController extends Controller
{

    protected $pathView = 'management.pages.services.facebook.';

    /**
     * @param Request $request
     * @param $type
     * @return Application|Factory|View|never
     */
    public function index(Request $request, $type)
    {
        switch ($type) {
            case 'like-sale':
                $title = 'Tăng like sale Facebook';
                $code = "like-post-sale";
                break;
            case 'like-speed':
                $title = 'Tăng like speed Facebook';
                $code = "like-post-speed";
                break;
            case 'like-comment':
                $title = 'Tăng like comment Facebook';
                $code = "like-comment";
                break;
            case 'comment-sale':
                $title = 'Tăng comment sale Facebook';
                $code = "comment-sale";
                break;
            case 'comment-speed':
                $title = 'Tăng comment speed Facebook';
                $code = "comment-speed";
                break;
            case 'sub-vip':
                $title = 'Tăng sub vip Facebook';
                $code = "sub-vip";
                break;
            case 'sub-sale':
                $title = 'Tăng sub sale Facebook';
                $code = "sub-sale";
                break;
            case 'sub-speed':
                $title = 'Tăng sub speed Facebook';
                $code = "sub-speed";
                break;
            case 'like-page-quality':
                $title = "Tăng like page quality Facebook";
                $code = "like-page-quality";
                break;
            case 'like-page-sale':
                $title = "Tăng like page sale Facebook";
                $code = "like-page-sale";
                break;
            case 'like-page-speed':
                $title = "Tăng like page speed Facebook";
                $code = "like-page-speed";
                break;
            case 'eye-live':
                $title = "Tăng eye live Facebook";
                $code = "eye-live";
                break;
            case 'view-video':
                $title = "Tăng view video Facebook";
                $code = "view-video";
                break;
            case 'share-profile':
                $title = "Tăng share profile Facebook";
                $code = "share-profile";
                break;
            case 'member-group':
                $title = "Tăng member group Facebook";
                $code = "member-group";
                break;
            case 'view-story':
                $title = "Tăng view story Facebook";
                $code = "view-story";
                break;
            case 'vip-like':
                $title = "Tăng vip like Facebook";
                $code = "vip-like";
                break;
            default:
                return abort(404);
        }

        $servers = ServicePack::where([
            'type_server' => 'facebook',
            'code_server' => $code,
            'api_service' => 'subgiare'
        ])->get();

        return view("management.pages.services.facebook.index", [
            'title' => $title,
            'servers' => $servers,
            'type' => $type
        ]);
    }
}
