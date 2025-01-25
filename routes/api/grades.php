<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\gradeControllers\GetAllGrades;
use App\Http\Controllers\gradeControllers\GetGradesById;
use App\Http\Controllers\gradeControllers\DeleteGrades;
use App\Http\Controllers\gradeControllers\UpdateGrades;
use App\Http\Controllers\gradeControllers\CreateGrades;
use App\Http\Controllers\gradeControllers\UpdatePartialGrades;

Route::get('/',[GetAllGrades::class, 'getAll']);
Route::get('/{id}', [GetGradesById::class, 'getById']);
Route::post('/', [CreateGrades::class, 'create']);
Route::put('/{id}', [UpdateGrades::class, 'update']);
Route::patch('/{id}', [UpdatePartialGrades::class, 'updatePartial']);
Route::delete('/{id}', [DeleteGrades::class, 'delete']);
