<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CharacterController;

Route::get('/',[CharacterController::class, 'index']);

Route::get('/{id}', [CharacterController::class, 'show']);

Route::post('/', [CharacterController::class, 'store']);

Route::put('/{id}', [CharacterController::class, 'update']);

Route::patch('/{id}', [CharacterController::class, 'updatePartial']);

Route::delete('/{id}', [CharacterController::class, 'destroy']);
