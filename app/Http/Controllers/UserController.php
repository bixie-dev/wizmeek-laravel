<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    <?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    public function newUser(Request $request){

        if(Auth::check()){
            return redirect(route('/'));
        }

        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
    }
}

}
