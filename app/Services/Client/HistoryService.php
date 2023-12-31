<?php

namespace App\Services\Client;

use App\Http\Resources\HistoryResource;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryService
{
    public function getFormattedLogs($type, $status, $server, $start, $length, $orderBy, $orderDir, $keyword)
    {
        $logs = History::query();
        switch ($type) {
            case 'like-post-sale':
                $code = "like-post-sale";
                break;
            case 'like-post-speed':
                $code = "like-post-speed";
                break;
            case 'like-comment':
                $code = "like-comment";
                break;
            case 'comment-sale':
                $code = "comment-sale";
                break;
            case 'comment-speed':
                $code = "comment-speed";
                break;
            case 'sub-vip':
                $code = "sub-vip";
                break;
            case 'sub-sale':
                $code = "sub-sale";
                break;
            case 'sub-speed':
                $code = "sub-speed";
                break;
            case 'like-page-quality':
                $code = "like-page-quality";
                break;
            case 'like-page-sale':
                $code = "like-page-sale";
                break;
            case 'like-page-speed':
                $code = "like-page-speed";
                break;
            case 'eye-live':
                $code = "eye-live";
                break;
            case 'view-video':
                $code = "view-video";
                break;
            case 'share-profile':
                $code = "share-profile";
                break;
            case 'member-group':
                $code = "member-group";
                break;
            case 'view-story':
                $code = "view-story";
                break;
            case 'vip-like':
                $code = "vip-like";
                break;
            default:
                $code = $type;
                break;
        }
        if ($type !== 'all') {
            $logs->where('type', $code);
        }
        if ($status !== 'all') {
            $logs->where('status', $status);
        }
        if ($server !== 'all') {
            $logs->where('server', $server);
        }
        if (!empty($keyword)) {
            $logs->where('username', 'like', '%' . $keyword . '%');
        }
        $logs->whereNotNull('order_id');
        if (!empty($orderBy) && !empty($orderDir)) {
            $logs->orderBy($orderBy, $orderDir);
        }
        if (!empty($start) && !empty($length)) {
            $logs->skip($start)->take($length);
        }
        $logs = $logs->get();
        $formattedLogs = [];
        if ($logs) {
            $formattedLogs = HistoryResource::collection($logs);
        }
        // Đếm tổng số lượng dòng dữ liệu
        $totalRecords = count($logs);
        // Trả về JSON response
        return response()->json([
            'aaData' => $formattedLogs,
            'iTotalDisplayRecords' => $totalRecords,
            'iTotalRecords' => $totalRecords,
        ]);
    }

    public function getFormattedLogReport($type, $start, $length, $orderBy, $orderDir, $keyword)
    {
        // Xử lý logic để truy vấn dữ liệu từ model History
        $logs = History::query();
        if ($type && in_array($type, ['payment', 'refund'])) {
            $logs->where('type', $type);
        }
        if (!empty($keyword)) {
            $logs->where('username', 'like', '%' . $keyword . '%');
        }
        if (!empty($orderBy) && !empty($orderDir)) {
            $logs->orderBy($orderBy, $orderDir);
        }
        if (!empty($start) && !empty($length)) {
            $logs->skip($start)->take($length);
        }
        $logs = $logs->get();
        $formattedLogs = [];
        if ($logs) {
            $formattedLogs = HistoryResource::collection($logs);
        }
        // Đếm tổng số lượng dòng dữ liệu
        $totalRecords = count($logs);
        // Trả về JSON response
        return response()->json([
            'aaData' => $formattedLogs,
            'iTotalDisplayRecords' => $totalRecords,
            'iTotalRecords' => $totalRecords,
        ]);
    }
}
