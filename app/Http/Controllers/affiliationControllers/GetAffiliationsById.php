<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class GetAffiliationsById{
    public function getById($id){

        $affiliation = Affiliation::with(['characters'])->find($id);

        if(!$affiliation) {
            $error = config('errors.affiliations.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($affiliation);
        
    }
}