<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class])
    ->name('home');

Route::get('/about-project', function () {
    return view('aboutproject');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('news/{news}', [NewsController::class,'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/categoryNews', [CategoryNewsController::class, 'index'])
    ->name('categoryNews');
Route::get('/categoryNews/{category}', [CategoryNewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('categoryNews.show');

Route::prefix('admin')
    ->group(function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('categories/{id)/show', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
});
