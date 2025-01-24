<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\characterControllers\GetAllCharacters;
use App\Http\Controllers\Api\characterControllers\GetCharactersById;
use App\Http\Controllers\Api\characterControllers\DeleteCharacters;
use App\Http\Controllers\Api\characterControllers\UpdateCharacters;
use App\Http\Controllers\Api\characterControllers\CreateCharacters;
use App\Http\Controllers\Api\characterControllers\UpdatePartialCharacters;

Route::get('/',[GetAllCharacters::class, 'getAll']);
Route::get('/{id}', [GetCharactersById::class, 'getById']);
Route::post('/', [CreateCharacters::class, 'create']);
Route::put('/{id}', [UpdateCharacters::class, 'update']);
Route::patch('/{id}', [UpdatePartialCharacters::class, 'updatePartial']);
Route::delete('/{id}', [DeleteCharacters::class, 'delete']);
