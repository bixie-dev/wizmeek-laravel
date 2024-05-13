<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Controller;
use App\Models\User\Feedback;

class RateController extends Controller
{
    public function __invoke()
    {
        $responseData = [
            'items' => Feedback::where('feedback_type', 'rate')->orderBy('created_at', 'DESC')->get(),
        ];

        return view('admin.feedback.rates', compact('responseData'));
    }
}
