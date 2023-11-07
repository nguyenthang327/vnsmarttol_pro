<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionFormRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Services\Admin\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function ajaxGetQuestions(Request $request)
    {
        $start = $request->input('start');
        $length = $request->input('length');
        $orderBy = $request->input('order_by');
        $orderDir = $request->input('order_dir');
        $keyword = $request->input('keyword');
        $contacts = $this->questionService->getQuestion($start, $length, $orderBy, $orderDir, $keyword);
        $formattedContacts = QuestionResource::collection($contacts);
        $result = [
            'aaData' => $formattedContacts,
            'iTotalDisplayRecords' => count($formattedContacts),
            'iTotalRecords' => count($formattedContacts),
        ];
        return response()->json($result);
    }

    public function store(QuestionFormRequest $request)
    {
        try {
            $id = $request->input('id');
            $question = $request->input('question');
            $answer = $request->input('answer');
            $this->questionService->createOrUpdateQuestion($id, $question, $answer);
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
            $contact = $this->questionService->getQuestionById($id);

            if (!$contact) {
                return response()->json([
                    "status" => 0,
                    "msg" => "Không tìm thấy câu hỏi thường gặp"
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
            $this->questionService->deleteQuestion($id);
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
