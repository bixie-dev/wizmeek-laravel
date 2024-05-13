<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\Admin\Users\FilterRequest;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;

class AdminUserController extends Controller
{
    /* Index Users */
    public function index(FilterRequest $request){
        if(auth()->user()->role == 'admin'){

            /* Number of all registered users */
            $userCount = count(User::all());

            /* Filter */
            $userQuery = User::query();
            $data = $request->validated();
            if(isset($data['id'])){
                $userQuery->where('id', '=', "{$data['id']}");
            }
            if(isset($data['name'])){
                $userQuery->where('name', 'like', "%{$data['name']}%");
            }
            if(isset($data['email'])){
                $userQuery->where('email', 'like', "%{$data['email']}%");
            }
            $users = $userQuery->paginate(50);
            return view('admin.users.index', compact('users', 'userCount'));
        } else {
            return redirect(route('homepage'));
        }
    }

    /* Create User */
    public function create() {
        if(auth()->user()->role == 'admin'){
            return view('admin.users.create');
        } else {
            return redirect(route('homepage'));
        }
    }

    /* Store a new User */
    public function store(StoreRequest $request) {
        if(auth()->user()->role == 'admin'){
            if($data = $request->validated()) {
                User::create($data);
            }
            return redirect(route('admin.users.index'));
        } else {
            return redirect(route('homepage'));
        }
    }

    /* Profile page */
    public function show(User $user) {
        if(auth()->user()->role == 'admin'){
            return view('admin.users.show', compact('user'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function update(UpdateRequest $request, User $user) {
        if(auth()->user()->role == 'admin'){
            if($data = $request->validated()){
                $result = $user->update($data);
                return redirect(route('admin.users.show', $user->id));
            }
        } else {
            return redirect(route('homepage'));
        }
    }
}
