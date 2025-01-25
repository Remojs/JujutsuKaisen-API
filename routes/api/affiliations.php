<?php

use Illuminate\Support\Facades\Route;

use App\Http\Handlers\affiliationHandler;

Route::get('/',[affiliationHandler::class, 'getAll']);
Route::get('/{id}', [affiliationHandler::class, 'getById']);
Route::post('/', [affiliationHandler::class, 'create']);
Route::put('/{id}', [affiliationHandler::class, 'update']);
Route::patch('/{id}', [affiliationHandler::class, 'updatePartial']);
Route::delete('/{id}', [affiliationHandler::class, 'delete']);
