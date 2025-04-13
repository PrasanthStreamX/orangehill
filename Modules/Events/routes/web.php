<?php

use Illuminate\Support\Facades\Route;
use Modules\Events\Http\Controllers\Backend\EventsBackendController;
use Modules\Events\Http\Controllers\FrontEnd\EventsFrontendController;

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

Route::prefix('admin/events')->middleware(['auth:sanctum', 'is_admin'])->group(function() {
    Route::resource('/', EventsBackendController::class)->names('events');
});


// Frontend 
Route::get('/events', [EventsFrontendController::class, 'index']);