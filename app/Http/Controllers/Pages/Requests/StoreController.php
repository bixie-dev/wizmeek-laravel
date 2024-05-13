<?php

namespace App\Http\Controllers\Pages\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\Requests\StoreRequest;
use App\Mail\Requests;
use Illuminate\Support\Facades\Mail;
use App\Models\Pages\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) 
    {
        $data = $request->validated();
        // dd($data);
        if($data['robots_filter'] < 2) {
            return redirect()->route('homepage')->with('error', 'Machine input is not allowed.');
        }

        unset($data['robots_filter']);

        $request_instance = Request::create($data);

        Mail::to('fake@email.com')->send(new Requests($data));

        return redirect()->back()->with('success', 'Your request has been sent!');
    }
}
