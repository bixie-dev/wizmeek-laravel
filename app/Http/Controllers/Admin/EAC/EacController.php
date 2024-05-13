<?php

namespace App\Http\Controllers\Admin\EAC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Eac\StoreRequest;

use App\Models\Admin\Eac;

class EacController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin'){
            $eacs = Eac::orderBy('id', 'DESC')->paginate(50);
            return view('admin.eac.index', compact('eacs'));
        } else {
            return redirect(route('homepage'));
        }
    }

    public function create() {
        if(auth()->user()->role == 'admin'){
            return view('admin.eac.create');
        } else {
            return redirect(route('homepage'));
        }
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        if(isset($data['multiple_registrations'])){
            $data['multiple_registrations'] = 1;
        } else {
            $data['multiple_registrations'] = 0;
        }


        if(!isset($data['eac'])){

            /* Random string generating */
            function generateRandomString($length) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            $randomString = generateRandomString(8);

            $matchingRows = count(Eac::where('eac', '=', $randomString)->get());

            if($matchingRows > 0){
                do{
                    $randomString = generateRandomString(8);
                    $matchingRows = count(Eac::where('eac', '=', $randomString)->get());
                } while($matchingRows != 0);
            }
            $data['eac'] = $randomString;
            $result = Eac::create($data);
            return redirect(route('admin.eac.index'));
        } else {
            $result = Eac::create($data);
            return redirect(route('admin.eac.index'));
        }
    }

    public function show(Eac $eac){
        if(auth()->user()->role == 'admin'){
            return view('admin.eac.show', compact('eac'));
        } else {
            return redirect(route('homepage'));
        }
    }
}
