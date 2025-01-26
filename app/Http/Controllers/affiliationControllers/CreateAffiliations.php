<?php

namespace App\Http\Controllers\affiliationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Affiliation;


class CreateAffiliations{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'affiliationName' => 'required',
            'type' => 'required',
            'location' => 'required',
            'controlledBy' => 'required'
        ]);

        if($validator->fails()){
            $error = config('errors.affiliations.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $affiliation = Affiliation::create([
            'affiliationName' => $request->affiliationName,
            'type' => $request->type,
            'location' => $request->location,
            'controlledBy' => $request->controlledBy
        ]);

        if(!$affiliation) {
            $error = config('errors.affiliations.store_error');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($affiliation, 201);
    }
}