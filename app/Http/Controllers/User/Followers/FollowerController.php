<?php

namespace App\Http\Controllers\User\Followers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function __invoke()
    {
        $data = [
            'followers' => auth()->user()->followers()->paginate(15),
        ];
        // dd($data);
        return view('user.followers', compact('data'));
    }
}
