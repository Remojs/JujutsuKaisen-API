<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class DeleteAffiliations{

    public function delete($id){
        $affiliation = Affiliation::find($id);

        if(!$affiliation) {
            $error = config('errors.affiliations.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $affiliation->delete();


        $success = config('errors.affiliations.destroy_success');
        return response()->json($success['message'], $success['code']);
        
    }

}