<?php

use Illuminate\Support\Facades\Route;


Route::prefix('characters')->group(function() {
    require base_path('routes/api/characters.php');
});