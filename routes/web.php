<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/', 'welcome');

Route::controller(CategoryController::class)->name('category.')->prefix('/category')->group(function(){

    Route::get('/create', 'create')->name('create');
    Route::get('/edit', 'edit')->name('edit');
    Route::get('/', 'index')->name('list');
    Route::get('/show', 'show')->name('show');
    Route::post('/creat', 'store')->name('store');
    Route::post('/edit', 'update')->name('update');
});


Route::get('/home-page',[DashboardController::class, 'home'])->name('home');
Route::get('/about-page',[AboutController::class, 'about'])->name('about');
Route::get('/contact',[ContactController::class, 'contact'])->name('contact');

Route::get('/hello',[HomeController::class, 'index']);

