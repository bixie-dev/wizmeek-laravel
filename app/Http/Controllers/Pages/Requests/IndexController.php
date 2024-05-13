<?php

namespace App\Http\Controllers\Pages\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('pages.requests.index');
    }
}
