<?php

use Illuminate\Support\Facades\Route;
use Modules\PhotoGallery\Http\Controllers\Backend\GalleryController;
use Modules\PhotoGallery\Http\Controllers\Backend\MediaController;

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

Route::prefix('admin')->middleware(['auth:sanctum', 'is_admin'])->group(function() {
    Route::resource('gallery', GalleryController::class)->names('gallery');
    Route::resource('media', MediaController::class)->names('media');
});
