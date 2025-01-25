<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\gradeControllers\GetAllGrades;
use App\Http\Controllers\Api\gradeControllers\GetGradesById;
use App\Http\Controllers\Api\gradeControllers\DeleteGrades;
use App\Http\Controllers\Api\gradeControllers\UpdateGrades;
use App\Http\Controllers\Api\gradeControllers\CreateGrades;
use App\Http\Controllers\Api\gradeControllers\UpdatePartialGrades;

Route::get('/',[GetAllGrades::class, 'getAll']);
Route::get('/{id}', [GetGradesById::class, 'getById']);
Route::post('/', [CreateGrades::class, 'create']);
Route::put('/{id}', [UpdateGrades::class, 'update']);
Route::patch('/{id}', [UpdatePartialGrades::class, 'updatePartial']);
Route::delete('/{id}', [DeleteGrades::class, 'delete']);
