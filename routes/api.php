<?php

use Illuminate\Support\Facades\Route;

Route::prefix('characters')->group(function() {
    require base_path('routes/api/characters.php');
});

Route::prefix('affiliations')->group(function() {
    require base_path('routes/api/affiliations.php');
});

Route::prefix('occupations')->group(function() {
    require base_path('routes/api/occupations.php');
});

Route::prefix('grades')->group(function() {
    require base_path('routes/api/grades.php');
});

Route::prefix('cursedTechniques')->group(function() {
    require base_path('routes/api/cursedTechniques.php');
});

Route::prefix('characterCursedTechniques')->group(function() {
    require base_path('routes/api/character_cursed_techniques.php');
});