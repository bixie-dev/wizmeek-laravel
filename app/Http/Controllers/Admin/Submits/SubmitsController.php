<?php

namespace App\Http\Controllers\Admin\Submits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Submit;
use App\Models\Admin\Submits\Genre;
use Illuminate\Support\Facades\Storage;

class SubmitsController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin'){
            $submits = Submit::all();
            return view('admin.submits.index', compact('submits'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function getYouTubeVideoId($url) {
     
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11,})/';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    public function show(Submit $submit) {

        if(auth()->user()->role == 'admin'){
            $genres = $submit->genre()->get();
            if(!empty($submit->youtube_link)){
                $youtubeLink = $this->getYouTubeVideoId($submit->youtube_link);
            } else {
                $youtubeLink = '';
            }
            
            return view('admin.submits.show', compact('submit', 'genres', 'youtubeLink'));
        } else {
            return redirect(route('homepage'));
        } 
    }

    public function destroy(Submit $submit) {
        if(auth()->user()->role == 'admin'){
            $submit->genre()->detach();
            if(!empty($submit->video_path)){
                $unlink = Storage::delete($submit->video_path);
                if($unlink){
                    $submit->delete();
                }
            }elseif(!empty($submit->youtube_link)){
                $submit->delete();
            } else {
                $submit->delete();
            }
            return redirect(route('admin.submits.index'));
        } else {
            return redirect(route('homepage'));
        }
    }
}
