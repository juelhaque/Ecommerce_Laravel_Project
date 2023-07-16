<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){

    Route::get('/admin', function (){
        return view('backend.layouts.master');
    });
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.list');

    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');

    // GET	/photos/{photo}	show	photos.show
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    // GET	/photos/{photo}/edit	edit	photos.edit
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

    // PUT/PATCH	/photos/{photo}	update	photos.update
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

    // DELETE	/photos/{photo}	destroy	photos.destroy
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');



    // ----------------------------------Product Routes----------------------------------

    Route::get('/products', [ProductController::class, 'index'])->name('products.list');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    // --------------------------pdf excel routes-----------------
    Route::get('/categories/pdf', [CategoryController::class, 'categoryPdf'])->name('categories.pdf');

    Route::get('/categories/excel', [CategoryController::class, 'export'])->name('categories.excel');

    Route::post('/categories/import', [CategoryController::class, 'import'])->name('categories.import');


});

// -------------------------------frontend routes----------------------
Route::get('/frontend', [FrontendController::class, 'index'])->name('frontend.index');

