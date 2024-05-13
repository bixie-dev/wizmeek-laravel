<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Submit;
use App\Models\Admin\Submits\Genre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\User\VideoUploadRequest;
use App\Http\Requests\User\SubmitRequest;
use App\Http\Requests\User\RequestEacRequest;
use App\Models\Admin\Landing;
use App\Models\User\RequestEac;

class SubmitController extends Controller
{
    public function index() {
        $genres = Genre::all();
        $text = Landing::find(1);
        return view('main.submit.submit', compact('genres', 'text'));
    }

    public function submit() {
        $text = Landing::find(1);
        return view('main.submit.submitauth', compact('text'));
    }
    public function eacreq(RequestEacRequest $request){
        $data = $request->validated();
        $data['new'] = 1;
        $result = RequestEac::create($data);
        return redirect(route('homepage'));
    }

    public function videoUpload(VideoUploadRequest $request) {

        if($file = $request->validated()){
            
            $video = $request->file('file');
            $videoPath = $video->store('content/user/submitted-videos');
            return response()->json([$videoPath]);
        }
    }

    public function store(SubmitRequest $request) {
        if($data = $request->validated()) {
            $data['user_id'] = auth()->user()->id;
            $data['flag_new'] = 1;
            $submit = Submit::create($data);

            if(isset($data['genre'])){
                $submit->genre()->attach($data['genre']);
            }

            $response = 'Success';
            return response()->json([$response]);
        }
    }
}
