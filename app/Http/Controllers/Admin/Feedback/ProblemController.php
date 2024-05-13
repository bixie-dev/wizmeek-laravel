<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\User\Feedback;

class ProblemController extends Controller
{
    public function __invoke()
    {
        $responseData = [
            'items' => Feedback::where('feedback_type', 'problem')->orderBy('created_at', 'DESC')->get(),
        ];
    
        return view('admin.feedback.problems', compact('responseData'));
    }
}
