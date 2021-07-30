<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController; 
use App\Http\Controllers\RestaurantController; 

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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'menus'], function(){
    Route::get('', [MenuController::class, 'index'])->name('menu.index');
    Route::get('create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('edit/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('update/{menu}', [MenuController::class, 'update'])->name('menu.update');
    Route::post('delete/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('show/{menu}', [MenuController::class, 'show'])->name('menu.show');
});

Route::group(['prefix' => 'restaurants'], function(){
    Route::get('', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('create', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('store', [RestaurantController::class, 'store'])->name('restaurant.store');
    Route::get('edit/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::post('update/{restaurant}', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::post('delete/{restaurant}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
    Route::get('show/{restaurant}', [RestaurantController::class, 'show'])->name('restaurant.show');
});
 
 
