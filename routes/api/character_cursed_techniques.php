<?php

use Illuminate\Support\Facades\Route;

use App\Http\Handlers\characterCursedTechniquesHandler;

Route::get('/',[characterCursedTechniquesHandler::class, 'getAll']);
Route::get('/',[characterCursedTechniquesHandler::class, 'getAllId']);
Route::get('/{id}', [characterCursedTechniquesHandler::class, 'getById']);
Route::post('/', [characterCursedTechniquesHandler::class, 'create']);
Route::put('/{id}', [characterCursedTechniquesHandler::class, 'update']);
Route::delete('/{id}', [characterCursedTechniquesHandler::class, 'delete']);
