<?php

namespace App\Http\Controllers\Admin\EAC;

use App\Http\Controllers\Controller;
/* Requests */
use Illuminate\Http\Request;
/* Models */
use App\Models\User\RequestEac;
use App\Models\Admin\Eac;

class RequestEacController extends Controller
{
    public function index() {
        $response_data = [
            'requests' => RequestEac::orderBy('id', 'DESC')->get()
        ];
        //dd($response_data);
        return view('admin.eacrequests.index', compact('response_data'));
    }

    public function show(RequestEac $eacrequest) {
        $response_data = [
            'request' => $eacrequest
        ];
        return view('admin.eacrequests.show', compact('response_data'));
    }

    public function process(RequestEac $eacrequest) {
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

            $request_data = [
                'new' => 0,
                'eac_id' => $result->id
            ];
            $eacrequest->update($request_data);

            return redirect(route('admin.eacreq.show', $eacrequest->id));
    }
}
