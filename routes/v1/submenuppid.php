<?php


use App\Http\Controllers\Api\v1\SubmenuPpidController;
use Illuminate\Support\Facades\Route;



Route::get('/submenuppid/web_content', [SubmenuPpidController::class, 'web_content']);
// Route::get('/berita/kota', [ScrapperController::class, 'index']);

Route::middleware('auth:api')
    ->group(function () {
        Route::get('/submenuppids', [SubmenuPpidController::class, 'index']);
        Route::post('/submenuppid/store', [SubmenuPpidController::class, 'store']);
        Route::post('/submenuppid/destroy', [SubmenuPpidController::class, 'destroy']);
        // Route::post('/berita/upload_word', [UploadWord::class, 'upload_word']);
        // Route::post('/berita/update_status', [BeritaController::class, 'update_status']);
    });
