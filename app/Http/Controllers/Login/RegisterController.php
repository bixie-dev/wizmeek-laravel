<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\Eac;

class RegisterController extends Controller
{
    /* Signup function */
    public function newUser(Request $request) {

        $validateFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'eac' => 'required'
        ], [
            'email.unique' => 'The email address has already been taken.',
        ]);
    
        $data = [
            'name' => $validateFields['name'],
            'email' => $validateFields['email'],
            'password' => $validateFields['password'],
            'promo_code' => $validateFields['eac'],
        ];

    
        $user = User::create($data);

        // dd($data['password'], $user->password);
    
        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('verification.notice');
        } else {
            return redirect(route('user.login'))->withErrors([
                'formError' => 'An error occurred while saving a new user.'
            ]);
        }
    }
    

    /* Login function */
    public function login(Request $request)
    {
        // Validation rules for the form fields
        $rules = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
        

        // Validate the form data
        $request->validate($rules);

        $formFields = $request->only(['email', 'password']);

        try {
            // Attempt to authenticate the user
            if (Auth::attempt($formFields)) {
                // Authentication successful, proceed with login
                return redirect()->route('chan.show', 'art');
            } else {
                return redirect()->back()->withErrors(['password' => 'Incorrect email or password']);
            }
        } catch (\Exception $e) {
            // Handle exceptions here, e.g., log the error
            return redirect()->route('user.login')->withErrors([
                'formError' => 'Authorization was unsuccessful'
            ]);
        }
    }



    /* logout function */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
