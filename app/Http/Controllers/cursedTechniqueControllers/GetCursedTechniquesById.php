<?php

namespace App\Http\Controllers\cursedTechniqueControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CursedTechniques;

class GetCursedTechniquesById{
    public function getById($id){

        $cursedTechnique = CursedTechniques::find($id);

        if(!$cursedTechnique) {
            $error = config('errors.cursedTechniques.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($cursedTechnique);
        
    }
}