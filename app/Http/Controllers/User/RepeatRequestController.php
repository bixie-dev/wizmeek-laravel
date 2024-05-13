<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* Models */
use App\Models\User\RepeatRequest;
/* Requests */
use App\Http\Requests\User\RepeatRequestRequest;

class RepeatRequestController extends Controller
{
    public function store(RepeatRequestRequest $request) {
        if($data = $request->validated()) {
            $result = RepeatRequest::create($data);
            if($result){
                $response = 'Your request has been saved!';
            } else {
                $response = 'Something went wrong, try again later!';
            }
        } else {
            $response = 'Validation failed.';
        }
        return response()->json($response);
    }
}
