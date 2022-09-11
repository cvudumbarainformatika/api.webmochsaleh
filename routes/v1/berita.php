<?php

use App\Http\Controllers\Api\v1\BeritaController;
use App\Http\Controllers\Api\v1\UploadWord;
use Illuminate\Support\Facades\Route;



Route::get('/berita/data_beranda', [BeritaController::class, 'web_beranda']);

Route::middleware('auth:api')
->group(function () {
    Route::get('/beritas', [BeritaController::class, 'index']);
    Route::post('/berita/upload_word', [UploadWord::class, 'upload_word']);
    Route::post('/berita/store', [BeritaController::class, 'store']);
    Route::post('/berita/destroy', [BeritaController::class, 'destroy']);
});


