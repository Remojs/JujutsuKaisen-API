<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\GradeController;

Route::get('/',[GradeController::class, 'index']);

Route::get('/{id}', [GradeController::class, 'show']);

Route::post('/', [GradeController::class, 'store']);

Route::put('/{id}', [GradeController::class, 'update']);

Route::patch('/{id}', [GradeController::class, 'updatePartial']);

Route::delete('/{id}', [GradeController::class, 'destroy']);
