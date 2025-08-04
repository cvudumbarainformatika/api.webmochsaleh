<?php

use App\Http\Controllers\Api\v1\ScrapperController;
use App\Http\Controllers\AutogenController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/autogen', [AutogenController::class, 'index']);
Route::get('/autogen/coba', [AutogenController::class, 'coba']);

Route::get('/scrapper/coba', [ScrapperController::class, 'index']);


Route::get('/img-webp/{filename}', function ($filename) {
    $sourcePath = storage_path("app/public/images/{$filename}");

    if (!file_exists($sourcePath)) {
        abort(404, 'Original image not found.');
    }

    $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
    $webpPath = storage_path("app/public/images-webp/{$nameWithoutExt}.webp");

    if (!file_exists($webpPath)) {
        // Konversi ke webp jika belum ada
        $img = Image::make($sourcePath)->encode('webp', 80);
        $img->save($webpPath);
    }

    return response()->file($webpPath, ['Content-Type' => 'image/webp']);
});
