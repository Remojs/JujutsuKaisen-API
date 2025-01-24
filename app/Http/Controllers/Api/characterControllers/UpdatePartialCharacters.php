<?php

namespace App\Http\Controllers\Api\characterControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class UpdatePartialCharacters{
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