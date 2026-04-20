<?php

use App\Http\Controllers\Api\v1\ScrapperController;
use App\Http\Controllers\AutogenController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

    if (!File::exists($sourcePath)) {
        abort(404, 'Original image not found.');
    }

    $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
    $webpDir = storage_path("app/public/images-webp");
    $webpPath = "{$webpDir}/{$nameWithoutExt}.webp";

    // Buat folder jika belum ada
    if (!File::exists($webpDir)) {
        File::makeDirectory($webpDir, 0755, true);
    }

    // Konversi jika belum tersedia
    if (!File::exists($webpPath)) {
        try {
            $img = Image::make($sourcePath)->encode('webp', 80);
            $img->save($webpPath);
        } catch (\Exception $e) {
            abort(500, 'Failed to convert image: ' . $e->getMessage());
        }
    }

    return Response::file($webpPath, [
        'Content-Type' => 'image/webp',
        'Cache-Control' => 'public, max-age=2592000', // 30 hari cache
    ]);
});
