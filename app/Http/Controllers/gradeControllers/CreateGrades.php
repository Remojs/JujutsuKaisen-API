<?php

namespace App\Http\Controllers\gradeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Grade;


class CreateGrades{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
        'gradeLevel' => 'required',
        ]);

        if($validator->fails()){
            $error = config('errors.grades.validation_fails');
            return response()->json(['message' => $error['message'],'errors'=> $validator->errors(),'status' => $error['code'],], $error['code']);
        }

        $grade = Grade::create([
            'gradeLevel' => $request->gradeLevel,
        ]);

        if(!$grade) {
            $error = config('errors.grades.store_error');
            return response()->json(['message' => $error['message'],'errors'=> $validator->errors(),'status' => $error['code'],], $error['code']);
        }

        return response()->json($grade, 201);
    }
}