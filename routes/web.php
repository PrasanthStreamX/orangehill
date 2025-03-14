<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FeaturedLinksController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::get('/cache-clear', function() {
    Artisan::call("optimize:clear");
    return "Cache is cleared";
});

Route::get('/routecache', function() {
    Artisan::call('route:clear');
    return "config is cleared";
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link') ;
    return "Storage is linked";
});

// Frontend routes
Route::get('/', [HomeController::class, 'index']);

// Backend (Admin) routes
Route::group(['middleware' => ['auth']], function() {
    Route::prefix('/admin')->group(function() {
        Route::controller(DashboardController::class)->group(function(){
            Route::get('/' , 'index');
            Route::get('/dashboard' , 'index');
        });
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('featured-links', FeaturedLinksController::class)->names('featured-links');
    });
});
