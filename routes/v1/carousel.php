<?php

use App\Http\Controllers\api\v1\CarouselController;
use Illuminate\Support\Facades\Route;



Route::get('/carousel', [CarouselController::class, 'index']);

Route::middleware('auth:api')
->group(function () {
    Route::get('/carousel/manage', [CarouselController::class, 'manage']);
    Route::post('/carousel/store', [CarouselController::class, 'store']);
    Route::post('/carousel/destroy', [CarouselController::class, 'destroy']);
});


