<?php

namespace App\Http\Controllers\User\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Feedback\StoreRequest;
use App\Models\User\Feedback;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $request->validated();
        $store_data = [
            'user_id' => auth()->user()->id,
            'user_name' => $request->user_name,
            'rating' => $request->rating ? $request->rating : '',
            'message' => $request->message? $request->message : '',
            'feedback_type' => $request->feedback_type,
        ];
        // dd($store_data);
        $result = Feedback::create($store_data);
        Mail::to('fake@email.com')->send(new FeedbackMail($store_data));
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
