<?php

namespace App\Http\Controllers\Admin\Submits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Submits\GenreStoreRequest;
use App\Http\Requests\Admin\Submits\GenreUpdateRequest;

use App\Models\Admin\Submits\Genre;

class GenreController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin'){
            $genres = Genre::all();
            return view('admin.submits.genres.index', compact('genres'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function create() {
        if(auth()->user()->role == 'admin'){
            return view('admin.submits.genres.create');
        } else {
            return redirect(route('homepage'));
        }
    }

    public function store(GenreStoreRequest $request) {

        if(auth()->user()->role == 'admin'){
            $data = $request->validated();
            Genre::create($data);
            return redirect(route('admin.genres.index'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function show(Genre $genre) {
        if(auth()->user()->role == 'admin'){
            return view('admin.submits.genres.show', compact('genre'));
        } else {
            return redirect(route('homepage'));
        }
    }
    public function edit(Genre $genre) {
        if(auth()->user()->role == 'admin'){
            return view('admin.submits.genres.edit', compact('genre'));
        } else {
            return redirect(route('homepage'));
        } 
    }
    public function update(GenreUpdateRequest $request, Genre $genre) {
        if(auth()->user()->role == 'admin'){
            $data = $request->validated();

            $genre->update($data);
            return redirect(route('admin.genres.index'));
        } else {
            return redirect(route('homepage'));
        }
    }
    public function destroy(Genre $genre) {
        if(auth()->user()->role == 'admin'){
            $genre->delete();
            return redirect(route('admin.genres.index'));
        } else {
            return redirect(route('homepage'));
        }
    }
}
