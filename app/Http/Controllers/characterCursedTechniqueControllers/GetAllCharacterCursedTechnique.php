<?php

namespace App\Http\Controllers\characterCursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\CharacterCursedTechnique;


class GetAllCharacterCursedTechniques{
    public function getAll(){

        $characterCursedTechnique = CharacterCursedTechnique::with(['characters', 'cursed_techniques'])->get();

        if ($characterCursedTechnique->isEmpty()) {
            $error = config('errors.grades.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($characterCursedTechnique, 200);
    }
} 