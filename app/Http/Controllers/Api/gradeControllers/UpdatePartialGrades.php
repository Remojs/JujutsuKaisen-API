<?php

namespace App\Http\Controllers\Api\gradeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Grade;


class UpdatePartialGrades{
    public function updatePartial(Request $request, $id){
        $occupation = Grade::find($id);

        if (!$grade) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        if (!$grade) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [
            'gradeLevel' => 'required',
        ]);

        if ($validator->fails()) {
            $error = config('errors.characters.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        if($request->has('gradeLevel')){ $grade->gradeLevel = $request->gradeLevel; }

        $grade->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'grade' => $grade,
            'status' => $success['code'],
        ], $success['code']);

        

    }
}