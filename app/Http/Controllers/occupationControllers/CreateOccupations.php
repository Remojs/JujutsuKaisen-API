<?php

namespace App\Http\Controllers\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Occupation;


class CreateOccupations{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
        'occupationName' => 'required',
        'status' => 'required',
        'leader' => 'required',
        ]);

        if($validator->fails()){
            $error = config('errors.characters.validation_fails');
            return response()->json(['message' => $error['message'],'errors'=> $validator->errors(),'status' => $error['code'],], $error['code']);
        }

        $occupation = Occupation::create([
            'occupationName' => $request->occupationName,
            'status' => $request->status,
            'leader' => $request->leader,
        ]);

        if(!$occupation) {
            $error = config('errors.characters.store_error');
            return response()->json(['message' => $error['message'],'errors'=> $validator->errors(),'status' => $error['code'],], $error['code']);
        }

        return response()->json($occupation, 201);
    }
}