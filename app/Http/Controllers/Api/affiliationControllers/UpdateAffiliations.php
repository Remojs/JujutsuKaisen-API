<?php

namespace App\Http\Controllers\Api\affiliationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class UpdateAffiliations{
    public function update(Request $request, $id){ //update

        $affiliation = Affiliation::find($id);

        if (!$affiliation) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ //valido los datos que llegan, los cuales son todos requeridos
            'affiliationName' => 'required',
            'type' => 'required',
            'location' => 'required',
            'controlledBy' => 'required',
            ]);

        if ($validator->fails()) { // Si falla la validación, devuelve el mensaje de error
            $error = config('errors.characters.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        $affiliation->affiliationName = $request->affiliationName;
        $affiliation->type = $request->type;
        $affiliation->location = $request->location;
        $affiliation->controlledBy = $request->controlledBy;

        $affiliation->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'character' => $affiliation,
            'status' => $success['code'],
        ], $success['code']);
    }
}