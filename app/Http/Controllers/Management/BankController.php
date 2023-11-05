<?php

namespace App\Http\Controllers\Management;

use App\Helpers\InforWebHelper;
use App\Http\Controllers\Controller;
use App\Models\Banker;
use App\Models\BankHistory;
use App\Models\History;
use App\Models\User;
use App\Services\Bank\BankService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BankController extends Controller
{
    protected $bankService;

    public function __construct() {
        $this->bankService = new BankService();
    }

    /**
     * mb bank
     */
    public function MBBCallback()
    {
        try {
            $path = 'historyapimb';
            $bankCode = 'mbbank';
            $type = 'MB Bank';
            $typeHistory = History::TYPE_BANK_MB;
            $this->bankService->hanldeBankCallback($path, $bankCode, $type, $typeHistory); // call to service callback
        } catch (Exception $e) {
            Log::error('[BankController][bankCallback] error:' . $e->getMessage());
            throw new Exception('[BankController][bankCallback] error ' . $e->getMessage());
        }
    }
}
