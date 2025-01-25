<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\characterControllers\GetAllCharacters;
use App\Http\Controllers\characterControllers\GetCharactersById;
use App\Http\Controllers\characterControllers\DeleteCharacters;
use App\Http\Controllers\characterControllers\UpdateCharacters;
use App\Http\Controllers\characterControllers\CreateCharacters;
use App\Http\Controllers\characterControllers\UpdatePartialCharacters;

Route::get('/',[GetAllCharacters::class, 'getAll']);
Route::get('/{id}', [GetCharactersById::class, 'getById']);
Route::post('/', [CreateCharacters::class, 'create']);
Route::put('/{id}', [UpdateCharacters::class, 'update']);
Route::patch('/{id}', [UpdatePartialCharacters::class, 'updatePartial']);
Route::delete('/{id}', [DeleteCharacters::class, 'delete']);
