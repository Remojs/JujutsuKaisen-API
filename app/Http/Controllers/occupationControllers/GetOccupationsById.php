<?php

namespace App\Http\Controllers\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Occupation;


class GetOccupationsById{
    public function getById($id){

        $occupation = Occupation::with(['characters'])->find($id);

        if(!$occupation) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($occupation);
        
    }
}