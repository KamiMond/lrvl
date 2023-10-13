<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\SocialProviderController;
use Illuminate\Support\Facades\Auth;
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
    ->name('welcome');

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
    ->middleware(['auth', 'is.admin'])
    ->group(function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::get('/users', [AdminUsersController::class, 'index'])
            ->name('users');
        Route::resource('users', AdminUsersController::class);
        Route::get('/users/isadmin/{user}', [AdminUsersController::class, 'isadmin'])
            ->name('isadmin');
        Route::resource('resources', ResourcesController::class);
        Route::delete('/resources/delete/{resources}', [ResourcesController::class, 'delete'])
            ->name('resources.delete');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/{driver}/redirect', [SocialProviderController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social-providers.redirect');

    Route::get('/{driver}/callback', [SocialProviderController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social-providers.callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::post('image-upload', [AdminNewsController::class, 'storeImage'])
    ->name('image.upload');
