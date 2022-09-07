<?php

use App\Http\Controllers\Api\v1\BeritaController;
use Illuminate\Support\Facades\Route;



// Route::get('/carousel', [CarouselController::class, 'index']);

Route::middleware('auth:api')
->group(function () {
    Route::post('/berita/upload_word', [BeritaController::class, 'upload_word']);
});


