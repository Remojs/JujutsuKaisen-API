<?php

namespace App\Http\Controllers\Api\affiliationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class GetAllAffiliations{
    public function getAll(){

        $affiliation = Affiliation::with(['characters'])->get();

        if ($affiliation->isEmpty()) {
            $error = config('errors.characters.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($affiliation, 200);
    }
}