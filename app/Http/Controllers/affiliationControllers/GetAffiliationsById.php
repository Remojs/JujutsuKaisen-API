<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class GetAffiliationsById{
    public function getById($id){//getById

        $affiliation = Affiliation::with(['characters'])->find($id);

        if(!$affiliation) { //si no encuentra el character me tira el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($affiliation);
        
    }
}