<?php

namespace App\Http\Controllers\characterCursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\CharacterCursedTechnique;


class UpdateCharacterCursedTechniques{
    public function update(Request $request, $id){ //update

        $characterCursedTechnique = CharacterCursedTechnique::find($id);

        if (!$characterCursedTechnique) {
            $error = config('errors.grades.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [
            'character_id' => 'required',
            'technique_id' => 'required',
            ]);

        if ($validator->fails()) {
            $error = config('errors.grades.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $characterCursedTechnique->character_id = $request->character_id;
        $characterCursedTechnique->technique_id = $request->technique_id;

        $characterCursedTechnique->save();

        $success = config('errors.grades.update_success');
        return response()->json([
            'message' => $success['message'],
            'characterCursedTechnique' => $characterCursedTechnique,
            'status' => $success['code'],
        ], $success['code']);
    }
}