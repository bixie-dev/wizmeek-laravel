<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle() {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {

                $newUser = new User;
                $newUser->name = $google_user->name;
                $newUser->email = $google_user->email;
                $newUser->google_id = $google_user->id;
                $newUser->google_avatar = $google_user->avatar;

                $newUser->save();
                /* $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'avatar' => $google_user->getAvatar()
                ]); */
                Auth::login($newUser);
                return redirect()->intended('/');
            } else {
                Auth::login($user);
                return redirect()->intended('/');
            }
        } catch(\Throwable $th) {
            
            dd('Something went wrong!' . $th->getMessage());
            
        }
    }
}
