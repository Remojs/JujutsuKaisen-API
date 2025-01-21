<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CursedTechniquesController;

Route::get('/',[CursedTechniquesController::class, 'index']);

Route::get('/{id}', [CursedTechniquesController::class, 'show']);

Route::post('/', [CursedTechniquesController::class, 'store']);

Route::put('/{id}', [CursedTechniquesController::class, 'update']);

Route::patch('/{id}', [CursedTechniquesController::class, 'updatePartial']);

Route::delete('/{id}', [CursedTechniquesController::class, 'destroy']);
