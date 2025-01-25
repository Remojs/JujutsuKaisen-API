<?php

namespace App\Http\Controllers\Api\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Occupation;


class GetAllOccupations{
    public function getAll(){

        $occupation = Occupation::with(['characters'])->get();

        if ($occupation->isEmpty()) {
            $error = config('errors.characters.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($occupation, 200);
    }
}