<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class CharacterController
{
    public function index(){ //getAll

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

    public function store(Request $request){
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

    public function show($id){//getById

        $character = Character::find($id);

        if(!$character) { //si no encuentra el character me tira el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $data = [ //genero el arreglo con los datos del character para retornarlo
            'character' => $character,
            'status' => 200
        ];

        return response()->json($data, 201);
        
    }

    public function destroy($id){//delete

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

    public function update(Request $request, $id){ //update
        $character = Character::find($id);

        if (!$character) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ // Validar los datos que llegan
            'name' => 'required|max:155|unique:character,name,' . $character->id,
            'alias' => '',
            'species' => 'required|max:155',
            'birthday' => 'required|max:155',
            'age' => 'required|integer',
            'gender' => 'required|max:50',
            'occupation' => 'required|max:255',
            'affiliation' => 'required|max:255',
        ]);

        if ($validator->fails()) { // Si falla la validación, devuelve el mensaje de error
            $error = config('errors.characters.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $character->name = $request->name;
        $character->alias = $request->alias;
        $character->species = $request->species;
        $character->birthday = $request->birthday;
        $character->age = $request->age;
        $character->gender = $request->gender;
        $character->occupation = $request->occupation;
        $character->affiliation = $request->affiliation;

        $character->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'character' => $character,
            'status' => $success['code'],
        ], $success['code']);
    }

    public function updatePartial(Request $request, $id){
        $character = Character::find($id);

        if (!$character) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        if (!$character) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ // Validar los datos que llegan
            'name' => 'max:155|unique:character,name,' . $character->id,
            'alias' => '',
            'species' => 'max:155',
            'birthday' => 'max:155',
            'age' => 'integer',
            'gender' => 'max:50',
            'occupation' => 'max:255',
            'affiliation' => 'max:255',
        ]);

        if ($validator->fails()) { // Si falla la validación, devuelve el mensaje de error
            $error = config('errors.characters.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        if($request->has('name')){
        $character->name = $request->name;
        }

        if($request->has('alias')){
        $character->alias = $request->alias;
        }

        if($request->has('species')){
        $character->species = $request->species;
        }

        if($request->has('birthday')){
        $character->birthday = $request->birthday;
        }

        if($request->has('age')){
        $character->age = $request->age;
        }

        if($request->has('gender')){
        $character->gender = $request->gender;
        }

        if($request->has('occupation')){
        $character->occupation = $request->occupation;
        }

        if($request->has('affiliation')){
        $character->affiliation = $request->affiliation;
        }


        $character->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'character' => $character,
            'status' => $success['code'],
        ], $success['code']);

        

    }
}
