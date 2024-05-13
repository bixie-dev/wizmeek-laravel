<?php

namespace App\Http\Controllers\User\Followers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function __invoke()
    {
        $data = [
            'following' => auth()->user()->following()->paginate(15),
        ];
        // dd($data);
        return view('user.following', compact('data'));
    }
}
