<?php

namespace App\Http\Controllers\Api\characterControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class GetCharactersById
{
    public function getById($id){//getById

        $character = Character::with(['affilation', 'occupation', 'grade'])->find($id);

        if(!$character) { //si no encuentra el character me tira el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($character);
        
    }
}
