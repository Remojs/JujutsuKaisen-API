<?php

namespace App\Http\Controllers\cursedTechniqueControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CursedTechniques;


class GetAllCursedTechniques{
    public function getAll(){

        $cursedTechniques = CursedTechniques::get();

        if ($cursedTechniques->isEmpty()) {
            $error = config('errors.cursedTechniques.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($cursedTechniques, 200);
    }
} 