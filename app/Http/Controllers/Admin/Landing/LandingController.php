<?php

namespace App\Http\Controllers\Admin\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Landing\UpdateRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Admin\Landing;

class LandingController extends Controller
{
    public function edit() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            $landing = Landing::find(1);
            return view('admin.landing.edit', compact('landing'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function about(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            $landing = Landing::find(1);
            return view('admin.landing.about', compact('landing'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function terms(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            $landing = Landing::find(1);
            return view('admin.landing.terms', compact('landing'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function privacy(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            $landing = Landing::find(1);
            return view('admin.landing.privacy', compact('landing'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function submit(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            $landing = Landing::find(1);
            return view('admin.landing.submit', compact('landing'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function advertisement() {
        $landing = Landing::find(1);
        return view('admin.landing.advertisement', compact('landing'));
    }

    public function update(UpdateRequest $request) {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'copywrighter'){
            $landing = Landing::find(1);
            $data = $request->validated();

            if(isset($data['main_img'])){
                $data['main_img'] = $landing->main_img_change($data['main_img']);
            }
            if(isset($data['case1_img'])){
                $data['case1_img'] = $landing->case1_img_change($data['case1_img']);
            }
            if(isset($data['case2_img'])){
                $data['case2_img'] = $landing->case2_img_change($data['case2_img']);
            }
            if(isset($data['solution_img'])){
                $data['solution_img'] = $landing->solution_img_change($data['solution_img']);
            }
            if(isset($data['process_step1_img'])){
                $data['process_step1_img'] = $landing->process_step1_img_change($data['process_step1_img']);
            }
            if(isset($data['process_step2_img'])){
                $data['process_step2_img'] = $landing->process_step2_img_change($data['process_step2_img']);
            }
            if(isset($data['process_step3_img'])){
                $data['process_step3_img'] = $landing->process_step3_img_change($data['process_step3_img']);
            }

            $landing->update($data);
            return redirect(route('admin.landing.edit'));
        } else {
            return redirect(route('homepage'));
        }
    }
}
