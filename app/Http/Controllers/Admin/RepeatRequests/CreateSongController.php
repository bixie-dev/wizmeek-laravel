<?php

namespace App\Http\Controllers\Admin\RepeatRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateSongController extends Controller
{
    public function create(Request $request)
    {
        if(isset($request->channel_id)) {
            $responseData = [
                'channel_id' => $request->channel_id,
            ];
            return view('admin.repeat-requests.create', compact('responseData'));
        } else {
            return redirect()->back();
        }
    }
}
