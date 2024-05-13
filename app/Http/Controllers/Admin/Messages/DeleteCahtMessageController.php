<?php

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ChatMessage;

class DeleteCahtMessageController extends Controller
{
    public function __invoke(Request $request)
    {
        if(isset($request->message_id)) {
            $messageInstance = ChatMessage::find($request->message_id);
            $result = $messageInstance->delete();
        }

        return redirect()->back();
    }
}
