<?php

namespace App\Services\Admin;

use App\Models\Question;
use DB;
use Illuminate\Support\Facades\Log;

class QuestionService
{
    public function getQuestion($start, $length, $orderBy, $orderDir, $keyword)
    {
        $query = Question::query();
        if (!empty($keyword)) {
            $query->where('content', 'like', "%$keyword%");
        }
        if (!empty($orderBy) && !empty($orderDir)) {
            $query->orderBy($orderBy, $orderDir);
        }
        if (!empty($start) && !empty($length)) {
            $query->skip($start)->take($length);
        }
        return $query->get();
    }

    /**
     * @throws \Exception
     */
    public function createOrUpdateQuestion($id, $question, $answer)
    {
        DB::beginTransaction();
        $messageError = "Đã xảy ra lỗi trong quá trình thao tác";
        try {
            if ($id && is_numeric($id)) {
                $questionOld = Question::find($id);
                if (!$questionOld) {
                    $messageError = "Không tồn tại câu hỏi thường gặp";
                    throw new \Exception();
                }
                $questionOld->update([
                    'question' => $question,
                    'answer' => $answer
                ]);
            } else {
                Question::create([
                    'question' => $question,
                    'answer' => $answer,
                    'identity_website' => config('license.domain')
                ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('[QuestionService][createOrUpdateQuestion] error:' . $e->getMessage());
            throw new \Exception($messageError);
        }
    }

    public function getQuestionById($id)
    {
        return Question::find($id);
    }

    /**
     * @throws \Exception
     */
    public function deleteQuestion($id)
    {
        $question = $this->getQuestionById($id);

        if (!$question) {
            throw new \Exception("Không tồn tại câu hỏi thường gặp");
        }

        $question->delete();
    }
}
