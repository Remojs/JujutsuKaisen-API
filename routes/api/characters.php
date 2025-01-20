<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Characters List";
});

Route::get('/{id}', function () {
    return "Character info";
});

Route::post('/', function () {
    return "Creating characters";
});

Route::put('/{id}', function () {
    return "Updating characters";
});

Route::delete('/{id}', function () {
    return "Character deleted";
});
