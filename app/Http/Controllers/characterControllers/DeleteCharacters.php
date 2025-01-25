<?php

namespace App\Http\Controllers\characterControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class DeleteCharacters
{
    public function delete($id){//delete

        $character = Character::find($id);

        if(!$character) { //si no encuentra el character me tira el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $character->delete(); //elimina el character


        $success = config('errors.characters.destroy_success'); //envia el mensaje de exito
        return response()->json($success['message'], $success['code']);
        
    }
}