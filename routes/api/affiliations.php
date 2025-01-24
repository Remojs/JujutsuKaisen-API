<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\affiliationControllers\GetAllAffiliations;
use App\Http\Controllers\Api\affiliationControllers\GetAffiliationsById;
use App\Http\Controllers\Api\affiliationControllers\DeleteAffiliations;
use App\Http\Controllers\Api\affiliationControllers\UpdateAffiliations;
use App\Http\Controllers\Api\affiliationControllers\CreateAffiliations;
use App\Http\Controllers\Api\affiliationControllers\UpdatePartialAffiliations;

Route::get('/',[GetAllAffiliations::class, 'getAll']);
Route::get('/{id}', [GetAffiliationsById::class, 'getById']);
Route::post('/', [CreateAffiliations::class, 'create']);
Route::put('/{id}', [UpdateAffiliations::class, 'update']);
Route::patch('/{id}', [UpdatePartialAffiliations::class, 'updatePartial']);
Route::delete('/{id}', [DeleteAffiliations::class, 'delete']);
