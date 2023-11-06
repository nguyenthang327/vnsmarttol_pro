<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Services\Admin\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function ajaxGetContacts(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $orderBy = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $contacts = $this->contactService->getContacts($start, $length, $orderBy, $orderDir, $keyword);
        $formattedContacts = ContactResource::collection($contacts);
        $result = [
            'aaData' => $formattedContacts,
            'iTotalDisplayRecords' => count($formattedContacts),
            'iTotalRecords' => count($formattedContacts),
        ];
        return response()->json($result);
    }

    public function store(ContactRequest $request)
    {
        try {
            $id = $request->input('id');
            $image = $request->input('image');
            $content = $request->input('content');
            $link = $request->input('link');
            $this->contactService->createOrUpdateContact($id, $image, $content, $link);
            return response()->json([
                "status" => 1,
                "msg" => "Thao tác thành công!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }

    public function show(Request $request)
    {
        try {
            $id = $request->input('id');
            $contact = $this->contactService->getContactById($id);

            if (!$contact) {
                return response()->json([
                    "status" => 0,
                    "msg" => "Không tìm thấy thông tin liên hệ"
                ]);
            }
            return response()->json($contact);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input('id');
            $this->contactService->deleteContact($id);
            $response = [
                'status' => 1,
                'msg' => 'OK'
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => $e->getMessage()
            ]);
        }
    }
}
