<?php

use Illuminate\Support\Facades\Route;

use App\Http\Handlers\characterHandler;

Route::get('/',[characterHandler::class, 'getAll']);
Route::get('/{id}', [characterHandler::class, 'getById']);
Route::post('/', [characterHandler::class, 'create']);
Route::put('/{id}', [characterHandler::class, 'update']);
Route::patch('/{id}', [characterHandler::class, 'updatePartial']);
Route::delete('/{id}', [characterHandler::class, 'delete']);
