<?php


use App\Http\Controllers\Api\v1\SubmenuController;
use Illuminate\Support\Facades\Route;



// Route::get('/submenu/web_content', [SubmenuController::class, 'web_content']);
// Route::get('/berita/kota', [ScrapperController::class, 'index']);

Route::middleware('auth:api')
    ->group(function () {
        Route::get('/submenus', [SubmenuController::class, 'index']);
        Route::post('/submenu/store', [SubmenuController::class, 'store']);
        Route::post('/submenu/destroy', [SubmenuController::class, 'destroy']);
        // Route::post('/berita/upload_word', [UploadWord::class, 'upload_word']);
        // Route::post('/berita/update_status', [BeritaController::class, 'update_status']);
    });
