<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\cursedTechniqueControllers\GetAllCursedTechniques;
use App\Http\Controllers\Api\cursedTechniqueControllers\GetCursedTechniquesById;
use App\Http\Controllers\Api\cursedTechniqueControllers\DeleteCursedTechniques;
use App\Http\Controllers\Api\cursedTechniqueControllers\UpdateCursedTechniques;
use App\Http\Controllers\Api\cursedTechniqueControllers\CreateCursedTechniques;
use App\Http\Controllers\Api\cursedTechniqueControllers\UpdatePartialCursedTechniques;

Route::get('/',[GetAllCursedTechniques::class, 'getAll']);
Route::get('/{id}', [GetCursedTechniquesById::class, 'getById']);
Route::post('/', [CreateCursedTechniques::class, 'create']);
Route::put('/{id}', [UpdateCursedTechniques::class, 'update']);
Route::patch('/{id}', [UpdatePartialCursedTechniques::class, 'updatePartial']);
Route::delete('/{id}', [DeleteCursedTechniques::class, 'delete']);
