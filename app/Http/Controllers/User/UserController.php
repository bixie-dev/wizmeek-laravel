<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User\ChatMessage;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserAvatarRequest;
use App\Http\Requests\User\UserFollowRequest;
use App\Models\Admin\NiceDate;

class UserController extends Controller
{
    /* Main profile page */
    public function profile($user) {

        $check_user = User::find($user);
        if(!$check_user) {
            $user_id = User::where('nickname', $user)->first()->id;
            $user = User::find($user_id);
        } else {
            $user = $check_user;
        }
        // dd($user);
        /* Get all favorite channels */
        $channels = $user->favoriteChannels;

        /* Followers */
        $followers = $user->followers;
        $following = $user->following;

        return view('user.profile', compact('user', 'channels', 'followers', 'following'));
    }

    /* User Edit page */
    public function edit(User $user) {
        return view('user.editprofile', compact('user'));
    }

    /* User update patch */
    public function update(UserRequest $request, User $user) {

        $data = $request->validated();
        $user->update($data);

        $channels = auth()->user()->favoriteChannels;

        return view('user.profile', compact('user', 'channels'));
    }

    /* User avatar update patch */
    public function avatarUpdate(UserAvatarRequest $request, User $user)
    {
        // Validate the request data
        $data = $request->validated();

        if ($request->hasFile('file')) {
            // Delete the old avatar if it exists in the public directory
            if ($user->avatar) {
                $avatarPath = public_path('images/avatars/' . $user->avatar);
                if (file_exists($avatarPath)) {
                    unlink($avatarPath); // Delete the file
                }
            }

            // Delete the old avatar from storage
            if ($user->avatar) {
                Storage::delete('content/user/avatars/' . $user->avatar);
            }

            // Store the new avatar in the storage
            $avatarNew = $request->file('file');
            $avatarNewPath = $avatarNew->store('content/user/avatars');

            // Update the user's avatar field in the database
            $user->avatar = basename($avatarNewPath);
            $user->save();
        }

        return redirect(route('user.profile', compact('user')))
            ->with('success', 'Avatar updated successfully');
    }

    public function emailUpdate(Request $request) {
        $user = Auth::user();
        $userId = $user->id;
        $newEmail = $request->newEmail;
        
        $isExistUser = User::where('email', $request->newEmail)->first();
        if($isExistUser) {
            return back()->with('message', 'This email already used! Please use another one.');
        }
        if(!$newEmail) {
            return back()->with('message', 'This field is required!');
        }

        User::where('id', $user->id)
                     ->update(['email' => $newEmail]);
        return back()->with('message', 'Your email was changed!');



    }

    public function passwordUpdate(Request $request) {
        $user = Auth::user();
        $currentUserPassword = $user->password;
        $request->validate([
             'newPassword' => 'required|string|min:6',
             'currentPassword' => 'required|string|min:6',
        ]);

        if (Hash::check($request->currentPassword, $user->password)) {
            // Update the password
            User::where('id', $user->id)
                     ->update(['password' => Hash::make($request->newPassword)]);
            return redirect()->back()->with('success', 'Password changed successfully!');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    }

    public function deleteAccount() {
        $user = Auth::user();

            // Begin a database transaction
            DB::beginTransaction();
    
            // Delete associated chat messages
            ChatMessage::where('user_id', $user->id)->delete();
    
            // Delete associated submits
    
            // Now, delete the user's account
            User::find($user->id)->delete();
    
            // Commit the database transaction
            DB::commit();
    
            // Optionally, you can log the user out
            Auth::logout();
    
            return redirect()->route('/')->with('success', 'Account and associated data deleted successfully.');
        
    }

    public function follow(User $user) {
        auth()->user()->following()->toggle($user->id);
        $date = NiceDate::nice_date($user->created_at);

        /* Get all favorite channels */
        $channels = $user->favoriteChannels;

        
        $followers = $user->followers;
        $following = $user->following;
        return view('user.profile', compact('user', 'date', 'channels', 'followers', 'following'));
    }

}
