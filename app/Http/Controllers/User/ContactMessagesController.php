<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\ContacMessagesRequest;
/* Models */
use App\Models\User\ContactMessage;

class ContactMessagesController extends Controller
{
    public function store(ContacMessagesRequest $request) {
        $data = $request->validated();
        $data['new'] = 1;
        $result = ContactMessage::create($data);
        return redirect(route('homepage'));
    }
}
