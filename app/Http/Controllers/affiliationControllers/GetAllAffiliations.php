<?php

namespace App\Http\Controllers\affiliationControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class GetAllAffiliations{
    public function getAll(){

        $affiliation = Affiliation::with(['characters'])->get();

        if ($affiliation->isEmpty()) {
            $error = config('errors.affiliations.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($affiliation, 200);
    }
}