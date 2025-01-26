<?php

namespace App\Http\Controllers\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Occupation;


class UpdateOccupations{
    public function update(Request $request, $id){ //update

        $occupation = Occupation::find($id);

        if (!$occupation) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.occupations.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ //valido los datos que llegan, los cuales son todos requeridos
            'occupationName' => 'required',
            'status' => 'required',
            'leader' => 'required',
            ]);

        if ($validator->fails()) { // Si falla la validación, devuelve el mensaje de error
            $error = config('errors.occupations.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $occupation->occupationName = $request->occupationName;
        $occupation->status = $request->status;
        $occupation->leader = $request->leader;

        $occupation->save();

        $success = config('errors.occupations.update_success');
        return response()->json([
            'message' => $success['message'],
            'occupation' => $occupation,
            'status' => $success['code'],
        ], $success['code']);
    }
}