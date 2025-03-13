<?php

use App\Http\Controllers\QuotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('quotes', QuotesController::class);
Route::apiResource('quotes', QuotesController::class);
Route::get('./quotes/random', [QuotesController::class, 'random']);
Route::get('quotes/filter/{length}', [QuotesController::class, 'filterByLength']);
Route::get('quotes/popular', [QuotesController::class, 'popular']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
