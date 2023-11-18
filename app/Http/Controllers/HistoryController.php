<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Services\Client\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    protected $historyService;

    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }
    public function ajaxGetLogs(Request $request)
    {
        $type = $request->input('type', 'all');
        $status = $request->input('status', 'all');
        $server = $request->input('server', 'all');

        $start = $request->input('start');
        $length = $request->input('length');

        $orderBy = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');

        try {
            return $this->historyService->getFormattedLogs($type, $status, $server, $start, $length, $orderBy, $orderDir, $keyword);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'msg' => $e->getMessage()]);
        }
    }
}
