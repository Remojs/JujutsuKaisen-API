<?php

namespace App\Http\Controllers\characterCursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\CharacterCursedTechnique;
 

class GetCharacterCursedTechniquesById{
    public function getById($id){

        $characterCursedTechnique = CharacterCursedTechnique::with(['characters'])->find($id);

        if(!$characterCursedTechnique) {
            $error = config('errors.grades.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($characterCursedTechnique);
        
    }
}