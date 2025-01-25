<?php

namespace App\Http\Controllers\cursedTechniqueControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\CursedTechniques;


class CreateCursedTechniques{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'techniqueName' => 'required',
            'type' => 'required',
            'range' => 'required',
            'capabilities' => 'required'
            ]);
    
            if($validator->fails()){
                $error = config('errors.characters.validation_fails');
                return response()->json([
                    'message' => $error['message'],
                    'errors'=> $validator->errors(),
                    'status' => $error['code'],
                ], $error['code']);
            }
    
            $cursedTechnique = CursedTechniques::create([
                'techniqueName' => $request-> techniqueName,
                'type' => $request-> type,
                'range' => $request-> range,
                'capabilities' => $request-> capabilities
            ]);
    
            if(!$cursedTechnique) {
                $error = config('errors.characters.store_error');
                return response()->json([
                    'message' => $error['message'],
                    'errors'=> $validator->errors(),
                    'status' => $error['code'],
                ], $error['code']);
            }
    
            $data = [
                'cursedTechnique' => $cursedTechnique,
                'status' => 201
            ];
    
            return response()->json($data, 201);
    }
}