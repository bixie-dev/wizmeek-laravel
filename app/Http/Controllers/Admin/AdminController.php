<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            return view('admin.panel');
        } else {
            return redirect(route('homepage'));
        }
    }
}
