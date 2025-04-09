<?php

use Illuminate\Support\Facades\Route;
use Modules\FoodMenu\Http\Controllers\Backend\FoodMenuItemController;
use Modules\FoodMenu\Http\Controllers\Backend\FoodMenuCategoryController;
use Modules\FoodMenu\Http\Controllers\Backend\FoodMenuController;
use Modules\FoodMenu\Http\Controllers\Backend\FoodMenuTypeController;
use Modules\FoodMenu\Http\Controllers\Frontend\FEfoodMenuController;

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

Route::prefix('admin/foodmenu')->middleware(['auth:sanctum', 'is_admin'])->group(function() {
    Route::resource('item', FoodMenuItemController::class)->names('foodmenu.item');
    Route::controller(FoodMenuItemController::class)->group(function(){
        Route::post('/search','search')->name('foodmenu.item.search');
    });
    Route::resource('type', FoodMenuTypeController::class)->names('foodmenu.type');
    Route::resource('category', FoodMenuCategoryController::class)->names('foodmenu.category');
    Route::controller(FoodMenuController::class)->group(function(){
        Route::get('/create/{id?}', 'create');
        Route::post('/store', 'store')->name('foodmenu.store');
        Route::post('/update/order', 'updateOrder')->name('foodmenu.update.order');
        Route::get('/delete/{id?}/{type?}', 'destroy');
        Route::get('/view', 'show');
    });
});


// Frontend 
Route::get('/menu', [FEfoodMenuController::class, 'index']);
