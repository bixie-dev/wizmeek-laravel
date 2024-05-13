<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\User\Feedback;

class QuestionController extends Controller
{
    public function __invoke()
    {
        $responseData = [
            'items' => Feedback::where('feedback_type', 'question')->orderBy('created_at', 'DESC')->get(),
        ];
    
        return view('admin.feedback.questions', compact('responseData'));
    }
}
