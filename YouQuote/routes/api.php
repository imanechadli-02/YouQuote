<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/quotes/random', [QuoteController::class, 'random']);
Route::get('/quotes/filter', [QuoteController::class, 'filterByLength']);
Route::get('/quotes/{id}', [QuoteController::class, 'show']);

Route::post('/quotes', [QuoteController::class, 'store']);
Route::put('/quotes/{id}', [QuoteController::class, 'update']);
Route::delete('/quotes/{id}', [QuoteController::class, 'destroy']);
Route::get('/quotes/popular', [QuoteController::class, 'popular']);


