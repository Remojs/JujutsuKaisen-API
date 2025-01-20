<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\characterController;

Route::get('/',[characterController::class, 'index']);

Route::get('/{id}', function () {
    return "Character info";
});

Route::post('/', [characterController::class, 'store']);

Route::put('/{id}', function () {
    return "Updating characters";
});

Route::delete('/{id}', function () {
    return "Character deleted";
});
