<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AffiliationController;

Route::get('/',[AffiliationController::class, 'index']);

Route::get('/{id}', [AffiliationController::class, 'show']);

Route::post('/', [AffiliationController::class, 'store']);

Route::put('/{id}', [AffiliationController::class, 'update']);

Route::patch('/{id}', [AffiliationController::class, 'updatePartial']);

Route::delete('/{id}', [AffiliationController::class, 'destroy']);
