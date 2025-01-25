<?php

namespace App\Http\Controllers\Api\gradeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Grade;


class DeleteGrades{

    public function delete($id){

        $grade = Grade::find($id);

        if(!$grade) {
            $error = config('errors.characters.not_found');
            return response()->json(['message' => $error['message'],'status' => $error['code'],], $error['code']);
        }

        $grade->delete();

        $success = config('errors.characters.destroy_success');
        return response()->json($success['message'], $success['code']);
        
    }

}