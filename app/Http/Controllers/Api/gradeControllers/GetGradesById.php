<?php

namespace App\Http\Controllers\Api\gradeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Grade;


class GetGradesById{
    public function getById($id){

        $grade = Grade::with(['characters'])->find($id);

        if(!$grade) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'errors'=> $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }
        
        return response()->json($grade);
        
    }
}