<?php

namespace App\Http\Controllers\characterControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class CreateCharacters
{
    public function create(Request $request){
        //create
        $validator = Validator::make($request->all(), [ //valido los datos que llegan, los cuales son todos requeridos
            'name' => 'required|max:155|unique:characters',
            'alias' => 'required',
            'species' => 'required|max:155',
            'birthday' => 'required|max:155',
            'height' => 'required',
            'weight' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'animeDebut' => 'required',
            'mangaDebut' => 'required',
            'occupation_id' => 'required',
            'affiliation_id' => 'required',
            'grade_id' => 'required',
            ]);
    
            if($validator->fails()){ //si falla la validacion de datos tira el mensaje de fails
                $error = config('errors.characters.validation_fails');
                return response()->json([
                    'message' => $error['message'],
                    'errors'=> $validator->errors(),
                    'status' => $error['code'],
                ], $error['code']);
            }
    
            $character = Character::create([ //guardo los datos en la tabla
                'name' => $request->name,
                'alias' => $request->alias,
                'species' => $request->species,
                'birthday' => $request->birthday,
                'height' => $request->height,
                'weight' => $request->weight,
                'age' => $request->age,
                'gender' => $request->gender,
                'animeDebut' => $request->animeDebut,
                'mangaDebut' => $request->mangaDebut,
                'occupation_id' => $request->occupation_id,
                'affiliation_id' => $request->affiliation_id,
                'grade_id' => $request->grade_id
            ]);
    
            if(!$character) { //si no se creo el character me tira el mensaje de error
                $error = config('errors.characters.store_error');
                return response()->json([
                    'message' => $error['message'],
                    'errors'=> $validator->errors(),
                    'status' => $error['code'],
                ], $error['code']);
            }
    
            $data = [ //genero el arreglo con los datos del character creado para retornarlo
                'character' => $character,
                'status' => 201
            ];
    
            return response()->json($data, 201);
    }
}