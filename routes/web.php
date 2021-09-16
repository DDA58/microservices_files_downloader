<?php

use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\FileStatController;
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

Route::prefix('files_downloader')->group(static function () {
    Route::get('file/{file}', [FileDownloadController::class, 'download'])->middleware(['throttle:uploads'])->whereNumber(['file']);
    Route::get('file/{file}/stat', FileStatController::class)->whereNumber(['file']);
});
