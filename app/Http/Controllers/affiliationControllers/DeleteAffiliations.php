<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class DeleteAffiliations{

    public function delete($id){//delete

        $affiliation = Affiliation::find($id);

        if(!$affiliation) { //si no encuentra el character me tira el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $affiliation->delete(); //elimina el character


        $success = config('errors.characters.destroy_success'); //envia el mensaje de exito
        return response()->json($success['message'], $success['code']);
        
    }

}