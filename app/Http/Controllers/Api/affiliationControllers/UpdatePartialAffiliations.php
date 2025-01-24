<?php

namespace App\Http\Controllers\Api\affiliationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Affiliation;


class UpdatePartialAffiliations{
    public function updatePartial(Request $request, $id){
        $affiliation = Affiliation::find($id);

        if (!$affiliation) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        if (!$affiliation) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ // Validar los datos que llegan
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

        if($request->has('affiliationName')){
        $affiliation->affiliationName = $request->affiliationName;
        }
        
        if($request->has('type')){
        $affiliation->type = $request->type;
        }

        if($request->has('location')){
        $affiliation->location = $request->location;
        }

        if($request->has('controlledBy')){
        $affiliation->controlledBy = $request->controlledBy;
        }

        $affiliation->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'character' => $affiliation,
            'status' => $success['code'],
        ], $success['code']);

        

    }
}