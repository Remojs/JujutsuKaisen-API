<?php

namespace App\Http\Controllers\characterCursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CharacterCursedTechnique;


class CreateCharacterCursedTechniques{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'character_id' => 'required',
            'technique_id' => 'required',
        ]);

        if($validator->fails()){
            $error = config('errors.grades.validation_fails');
            return response()->json(['message' => $error['message'],'errors'=> $validator->errors(),'status' => $error['code'],], $error['code']);
        }

        $characterCursedTechnique = CharacterCursedTechnique::create([
            'character_id' => $request->character_id,
            'technique_id' => $request->technique_id,
        ]);

        if(!$characterCursedTechnique) {
            $error = config('errors.grades.store_error');
            return response()->json(['message' => $error['message'],'errors'=> $validator->errors(),'status' => $error['code'],], $error['code']);
        }

        return response()->json($characterCursedTechnique, 201);
    }
}