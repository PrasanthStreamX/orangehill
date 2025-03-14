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
    Route::resource('type', FoodMenuTypeController::class)->names('foodmenu.type');
    Route::resource('category', FoodMenuCategoryController::class)->names('foodmenu.category');
    Route::controller(FoodMenuController::class)->group(function(){
        Route::get('/create', 'create');
        Route::get('/view', 'show');
        Route::post('/store', 'store')->name('foodmenu.store');
        Route::get('/delete/{id?}', 'destroy');
    });
});


// Frontend 
Route::get('/menu', [FEfoodMenuController::class, 'index']);
