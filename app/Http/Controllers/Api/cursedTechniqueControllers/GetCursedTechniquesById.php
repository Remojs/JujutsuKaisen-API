<?php

namespace App\Http\Controllers\Api\cursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CursedTechniques;

class GetCursedTechniquesById{
    public function getById($id){

        $cursedTechnique = CursedTechniques::find($id);

        if(!$cursedTechnique) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($cursedTechnique);
        
    }
}