<?php

use Illuminate\Support\Facades\Route;

use App\Http\Handlers\gradeHandler;

Route::get('/',[gradeHandler::class, 'getAll']);
Route::get('/{id}', [gradeHandler::class, 'getById']);
Route::post('/', [gradeHandler::class, 'create']);
Route::put('/{id}', [gradeHandler::class, 'update']);
Route::patch('/{id}', [gradeHandler::class, 'updatePartial']);
Route::delete('/{id}', [gradeHandler::class, 'delete']);
