<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cursedTechniqueControllers\GetAllCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\GetCursedTechniquesById;
use App\Http\Controllers\cursedTechniqueControllers\DeleteCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\UpdateCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\CreateCursedTechniques;
use App\Http\Controllers\cursedTechniqueControllers\UpdatePartialCursedTechniques;

Route::get('/',[GetAllCursedTechniques::class, 'getAll']);
Route::get('/{id}', [GetCursedTechniquesById::class, 'getById']);
Route::post('/', [CreateCursedTechniques::class, 'create']);
Route::put('/{id}', [UpdateCursedTechniques::class, 'update']);
Route::patch('/{id}', [UpdatePartialCursedTechniques::class, 'updatePartial']);
Route::delete('/{id}', [DeleteCursedTechniques::class, 'delete']);
