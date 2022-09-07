<?php

use App\Http\Controllers\Api\v1\CategoryController;
use Illuminate\Support\Facades\Route;



// Route::get('/carousel', [CarouselController::class, 'index']);

Route::middleware('auth:api')
->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    // Route::post('/gallery/upload', [GalleryController::class, 'upload']);
});


