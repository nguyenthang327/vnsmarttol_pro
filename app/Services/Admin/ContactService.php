<?php

namespace App\Services\Admin;

use App\Models\Contact;
use DB;
use Illuminate\Support\Facades\Log;

class ContactService
{
    public function getContacts($start, $length, $orderBy, $orderDir, $keyword)
    {
        $query = Contact::query();
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
    public function createOrUpdateContact($id, $image, $content, $link)
    {
        DB::beginTransaction();
        $messageError = "Đã xảy ra lỗi trong quá trình thao tác";
        try {
            if ($id) {
                $contact = Contact::find($id);
                if (!$contact) {
                    $messageError = "Không tồn tại thông tin liên hệ";
                    throw new \Exception();
                }
                $contact->update([
                    'image' => $image,
                    'content' => $content,
                    'link' => $link
                ]);
            } else {
                Contact::create([
                    'image' => $image,
                    'content' => $content,
                    'link' => $link,
                    'identity_website' => config('license.domain')
                ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('[ContactService][createOrUpdateContact] error:' . $e->getMessage());
            throw new \Exception($messageError);
        }
    }

    public function getContactById($id)
    {
        return Contact::find($id);
    }

    /**
     * @throws \Exception
     */
    public function deleteContact($id)
    {
        $contact = $this->getContactById($id);

        if (!$contact) {
            throw new \Exception("Không tìm thấy thông tin liên hệ");
        }

        $contact->delete();
    }
}
