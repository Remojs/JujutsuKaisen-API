<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class UpdatePartialAffiliations{
    public function updatePartial(Request $request, $id){
        $affiliation = Affiliation::find($id);

        if (!$affiliation) {
            $error = config('errors.affiliations.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [
            'affiliationName' => '',
            'type' => '',
            'location' => '',
            'controlledBy' => '',
        ]);

        if ($validator->fails()) {
            $error = config('errors.affiliations.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        if($request->has('affiliationName')){
        $affiliation->affiliationName = $request->affiliationName;
        }
        
        if($request->has('type')){
        $affiliation->type = $request->type;
        }

        if($request->has('location')){
        $affiliation->location = $request->location;
        }

        if($request->has('controlledBy')){
        $affiliation->controlledBy = $request->controlledBy;
        }

        $affiliation->save();

        $success = config('errors.affiliations.update_success');
        return response()->json([
            'message' => $success['message'],
            'character' => $affiliation,
            'status' => $success['code'],
        ], $success['code']);

        

    }
}