<?php

namespace App\Http\Controllers\characterControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class GetAllCharacters
{
    public function getAll(){ //getAll

        $characters = Character::with(["affilation", "occupation", "grade"])->get();

        if ($characters->isEmpty()) { //si no tengo ninguna entrada en la tabla de Characters retorno el mensaje de not found
            $error = config('errors.characters.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($characters, 200);
    }
}
