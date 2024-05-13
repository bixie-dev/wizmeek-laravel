<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Admin\Eac;
use App\Models\Admin\Landing;

use App\Http\Requests\User\EacSignupRequest;

class HomeController extends Controller{

    public function home(){

        $page_title = 'Home';
        $text = Landing::find(1);

        return view('main.index', compact('text'));
    }

    public function about(){

        $page_title = 'About Us';
        $text = Landing::find(1);

        return view('main.about', compact('text'));
    }
    public function login(){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        return view('main.login.login');
    }
    public function signup(Eac $eac){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        $eacId = session('eacId');
        return view('main.login.signup', compact('eacId'));
    }
    public function csstest(){
        return view('csstest');
    }
    public function private(){
        return view('main.login.private');
    }
    public function newChannel(){
        return view('admin.channels.newchannel');
    }
    public function submit(){
        return view('main.submit');
    }
    public function terms(){

        $page_title = 'Terms and Conditions';
        $text = Landing::find(1);

        return view('main.terms', compact('text'));
    }
    public function settings(){
        return view('main.settings');
    }
    public function privacy(){

        $page_title = 'Privacy Policy';
        $text = Landing::find(1);

        return view('main.privacy-policy', compact('text'));
    }
    public function contact(){
        return view('main.contact');
    }
    public function verified(){
        return view('main.login.verified');
    }
    public function eacsignup(EacSignupRequest $request) {
        if($data = $request->validated()){
            if($eac = Eac::where('eac', '=', $data['eac'])->first()){
                if(!$eac->user || $eac->multiple_registrations == '1'){
                    $eacId = $eac->id;
                    return redirect(route('user.signup'))->with('eacId', $eacId);
                } else {
                    $errorMessage = 'The early access code you have entered is already registered in the system';
                    return view('main.eac.warning', compact('errorMessage'));
                }
               
            } else {
                $errorMessage = 'The Early access code you have entered is not valid';
                return view('main.eac.warning', compact('errorMessage'));
            }
        }
    }

    public function advertisement() {
        $response_data = [
            'text' => Landing::find(1)
        ];
        return view('main.advertisement', compact('response_data'));
    }

    /* Channels */
    
  /*   *
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* public function index()
    {
        return view('home');
    } */
}
