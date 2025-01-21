<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\characterController;

Route::get('/',[characterController::class, 'index']);

Route::get('/{id}', [characterController::class, 'show']);

Route::post('/', [characterController::class, 'store']);

Route::put('/{id}', [characterController::class, 'update']);

Route::delete('/{id}', [characterController::class, 'destroy']);
