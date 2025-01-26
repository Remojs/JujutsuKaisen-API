<?php

namespace App\Http\Controllers\cursedTechniqueControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CursedTechniques;


class DeleteCursedTechniques{

    public function delete($id){

        $cursedTechniques = CursedTechniques::find($id);

        if(!$cursedTechniques) {
            $error = config('errors.cursedTechniques.not_found');
            return response()->json(['message' => $error['message'],'status' => $error['code'],], $error['code']);
        }

        $cursedTechniques->delete();

        $success = config('errors.cursedTechniques.destroy_success');
        return response()->json($success['message'], $success['code']);
        
    }

}