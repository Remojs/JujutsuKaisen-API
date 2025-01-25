<?php

use Illuminate\Support\Facades\Route;

use App\Http\Handlers\occupationHandler;

Route::get('/',[occupationHandler::class, 'getAll']);
Route::get('/{id}', [occupationHandler::class, 'getById']);
Route::post('/', [occupationHandler::class, 'create']);
Route::put('/{id}', [occupationHandler::class, 'update']);
Route::patch('/{id}', [occupationHandler::class, 'updatePartial']);
Route::delete('/{id}', [occupationHandler::class, 'delete']);
