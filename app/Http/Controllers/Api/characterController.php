<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class characterController
{
    public function index(){

        $characters = Character::all();

        if ($characters->isEmpty()) { //si no tengo ninguna entrada en la tabla de Characters retorno el mensaje de not found
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($characters, 200);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [ //valido los datos que llegan, los cuales son todos requeridos
        'name' => 'required',
        'alias' => 'required',
        'species' => 'required',
        'birthday' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'occupation' => 'required',
        'affiliation' => 'required',
        ]);

        if($validator->fails()){ //si falla la validacion de datos tira el mensaje de fails
            $error = config('errors.characters.store_fails');
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
            'age' => $request->age,
            'gender' => $request->gender,
            'occupation' => $request->occupation,
            'affiliation' => $request->affiliation
        ]);

        if(!$character) {
            $error = config('errors.characters.store_error');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $data = [
            'character' => $character,
            'status' => 201
        ];

        return response()->json($data, 201);


    }


}
