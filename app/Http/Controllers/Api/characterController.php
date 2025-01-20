<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Character;


class characterController
{
    public function index(){

        $characters = Character::all();

        if ($characters->isEmpty()) {
            $error = config('errors.characters.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($characters, 200);
    }
}
