<?php

namespace App\Http\Controllers\gradeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Grade;


class GetAllGrades{
    public function getAll(){

        $occupation = Grade::with(['characters'])->get();

        if ($occupation->isEmpty()) {
            $error = config('errors.grades.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($occupation, 200);
    }
} 