<?php

namespace App\Http\Controllers\Api\cursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CursedTechniques;


class UpdatePartialCursedTechniques{
    public function updatePartial(Request $request, $id){
        $cursedTechnique = CursedTechniques::find($id);

        if (!$cursedTechnique) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [
            'techniqueName' => 'required',
            'type' => 'required',
            'range' => 'required',
            'capabilities' => 'required'
        ]);

        if ($validator->fails()) {
            $error = config('errors.characters.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }
        
        if($request->has('techniqueName')){$cursedTechnique->techniqueName = $request->techniqueName;}
        if($request->has('type')){$cursedTechnique->type = $request->type;}
        if($request->has('range')){$cursedTechnique->range = $request->range;}
        if($request->has('capabilities')){$cursedTechnique->capabilities = $request->capabilities;}

        $cursedTechnique->save();

        $success = config('errors.characters.update_success');
        return response()->json([
            'message' => $success['message'],
            'cursedTechnique' => $cursedTechnique,
            'status' => $success['code'],
        ], $success['code']);

        

    }
}