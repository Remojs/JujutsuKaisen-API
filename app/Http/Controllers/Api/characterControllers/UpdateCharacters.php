<?php

namespace App\Http\Controllers\Api\characterControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Character;


class UpdateCharacters{
    public function update(Request $request, $id){ //update
        $character = Character::find($id);

        if (!$character) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ //valido los datos que llegan, los cuales son todos requeridos
            'name' => 'required|max:155',
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
        $character->height = $request->height;
        $character->weight = $request->weight;
        $character->age = $request->age;
        $character->gender = $request->gender;
        $character->animeDebut = $request->animeDebut;
        $character->mangaDebut = $request->mangaDebut;
        $character->occupation_id = $request->occupation_id;
        $character->affiliation_id = $request->affiliation_id;
        $character->grade_id = $request->grade_id;

        $character->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'character' => $character,
            'status' => $success['code'],
        ], $success['code']);
    }
}