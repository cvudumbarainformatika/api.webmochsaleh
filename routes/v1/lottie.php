<?php

use App\Http\Controllers\Api\v1\LottieController;
use Illuminate\Support\Facades\Route;



// Route::get('/carousel', [CarouselController::class, 'index']);

Route::middleware('auth:api')
    ->group(function () {
        Route::get('/lotties', [LottieController::class, 'index']);
        Route::post('/lottie/upload', [LottieController::class, 'upload']);
    });
