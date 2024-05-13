<?php

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* Models */
use App\Models\User\ContactMessage;

class ContactUsMessagesController extends Controller
{
    public function index() {
        $idsToKeep = [4, 28, 31, 112, 129, 130, 135];

        ContactMessage::whereNotIn('id', $idsToKeep)->delete();
        $response_data = [
            'messages' => ContactMessage::orderBy('id', 'DESC')->get()
        ];
        return view('admin.contactus.index', compact('response_data'));
    }

    public function show(ContactMessage $message) {
        $data['new'] = 0;
        $message->update($data);
        return view('admin.contactus.show', compact('message'));
    }
}
