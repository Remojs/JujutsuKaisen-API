<?php

use Illuminate\Support\Facades\Route;

use App\Http\Handlers\cursedTechniqueHandler;

Route::get('/',[cursedTechniqueHandler::class, 'getAll']);
Route::get('/{id}', [cursedTechniqueHandler::class, 'getById']);
Route::post('/', [cursedTechniqueHandler::class, 'create']);
Route::put('/{id}', [cursedTechniqueHandler::class, 'update']);
Route::patch('/{id}', [cursedTechniqueHandler::class, 'updatePartial']);
Route::delete('/{id}', [cursedTechniqueHandler::class, 'delete']);
