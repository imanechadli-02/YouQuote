<?php

use App\Http\Controllers\QuotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('quotes', QuotesController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
