<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class AffiliationController
{
    public function index(){

        $affiliation = Affiliation::with(['characters'])->get();

        if ($affiliation->isEmpty()) {
            $error = config('errors.characters.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($affiliation, 200);
    }

    public function store(Request $request){//create
        $validator = Validator::make($request->all(), [ //valido los datos que llegan, los cuales son todos requeridos
        'affiliationName' => 'required',
        'type' => 'required',
        'location' => 'required',
        'controlledBy' => 'required'
        ]);

        if($validator->fails()){ //si falla la validacion de datos tira el mensaje de fails
            $error = config('errors.characters.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $affiliation = Affiliation::create([ //guardo los datos en la tabla
            'affiliationName' => $request->affiliationName,
            'type' => $request->type,
            'location' => $request->location,
            'controlledBy' => $request->controlledBy
        ]);

        if(!$affiliation) { //si no se creo el character me tira el mensaje de error
            $error = config('errors.characters.store_error');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $data = [ //genero el arreglo con los datos del character creado para retornarlo
            'character' => $affiliation,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id){//getById

    }

    public function update(Request $request, $id){ //update

    }

    public function updatePartial(Request $request, $id){

    }
}
