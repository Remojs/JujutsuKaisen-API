<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class UpdateAffiliations{
    public function update(Request $request, $id){ //update

        $affiliation = Affiliation::find($id);

        if (!$affiliation) {
            $error = config('errors.affiliations.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [
            'affiliationName' => 'required',
            'type' => 'required',
            'location' => 'required',
            'controlledBy' => 'required',
            ]);

        if ($validator->fails()) {
            $error = config('errors.affiliations.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $affiliation->affiliationName = $request->affiliationName;
        $affiliation->type = $request->type;
        $affiliation->location = $request->location;
        $affiliation->controlledBy = $request->controlledBy;

        $affiliation->save();

        $success = config('errors.affiliations.update_success');
        return response()->json([
            'message' => $success['message'],
            'affiliation' => $affiliation,
            'status' => $success['code'],
        ], $success['code']);
    }
}