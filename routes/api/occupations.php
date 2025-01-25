<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\occupationControllers\GetAllOccupations;
use App\Http\Controllers\Api\occupationControllers\GetOccupationsById;
use App\Http\Controllers\Api\occupationControllers\DeleteOccupations;
use App\Http\Controllers\Api\occupationControllers\UpdateOccupations;
use App\Http\Controllers\Api\occupationControllers\CreateOccupations;
use App\Http\Controllers\Api\occupationControllers\UpdatePartialOccupations;

Route::get('/',[GetAllOccupations::class, 'getAll']);
Route::get('/{id}', [GetOccupationsById::class, 'getById']);
Route::post('/', [CreateOccupations::class, 'create']);
Route::put('/{id}', [UpdateOccupations::class, 'update']);
Route::patch('/{id}', [UpdatePartialOccupations::class, 'updatePartial']);
Route::delete('/{id}', [DeleteOccupations::class, 'delete']);
