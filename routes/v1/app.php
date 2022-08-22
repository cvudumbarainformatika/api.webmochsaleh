<?php

use App\Http\Controllers\api\v1\AppController;
use Illuminate\Support\Facades\Route;



Route::get('/header', [AppController::class, 'header']);

Route::middleware('auth:api')
->group(function () {
    Route::post('/header/store_logo', [AppController::class, 'store_logo']);
    Route::post('/header/store', [AppController::class, 'store']);
    // Route::post('/logout', [AuthController::class, 'logout']);
});


