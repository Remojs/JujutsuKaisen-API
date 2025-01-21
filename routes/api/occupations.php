<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\OccupationController;

Route::get('/',[OccupationController::class, 'index']);

Route::get('/{id}', [OccupationController::class, 'show']);

Route::post('/', [OccupationController::class, 'store']);

Route::put('/{id}', [OccupationController::class, 'update']);

Route::patch('/{id}', [OccupationController::class, 'updatePartial']);

Route::delete('/{id}', [OccupationController::class, 'destroy']);
