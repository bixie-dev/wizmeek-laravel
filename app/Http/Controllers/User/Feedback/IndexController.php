<?php

namespace App\Http\Controllers\User\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Feedback\StoreRequest;
use App\Models\User\Feedback;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [
            
        ];
        return view('user.feedback.index');
    }
}
