<?php

namespace App\Http\Controllers\characterCursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\CharacterCursedTechnique;


class DeleteCharacterCursedTechniques{

    public function delete($id){

        $characterCursedTechnique = CharacterCursedTechnique::find($id);

        if(!$characterCursedTechnique) {
            $error = config('errors.grades.not_found');
            return response()->json(['message' => $error['message'],'status' => $error['code'],], $error['code']);
        }

        $characterCursedTechnique->delete();

        $success = config('errors.grades.destroy_success');
        return response()->json($success['message'], $success['code']);
        
    }

}