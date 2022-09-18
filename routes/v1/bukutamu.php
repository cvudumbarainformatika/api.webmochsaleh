<?php

use App\Http\Controllers\Api\v1\GalleryController;
use Illuminate\Support\Facades\Route;



// Route::get('/carousel', [CarouselController::class, 'index']);

Route::middleware('auth:api')
->group(function () {
    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::post('/gallery/upload', [GalleryController::class, 'upload']);
});


