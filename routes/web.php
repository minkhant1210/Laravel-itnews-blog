<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/detail/{slug}', [BlogController::class, 'detail'])->name('detail');
Route::get('/category/{id}', [BlogController::class, 'baseOnCategory'])->name('baseOnCategory');
Route::get('/user/{id}', [BlogController::class, 'baseOnUser'])->name('baseOnUser');
Route::get('/date/{date}', [BlogController::class, 'baseOnDate'])->name('baseOnDate');
Route::view('/about','blog.about')->name('about');


Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('category',CategoryController::class);
    Route::resource('article',ArticleController::class);

    Route::prefix('profile')->group(function (){
        Route::get('/',[ProfileController::class,'profile'])->name('profile');

        Route::get('edit-photo',[ProfileController::class,'editPhoto'])->name('profile.edit.photo');
        Route::post('/change-photo',[ProfileController::class,'changePhoto'])->name('profile.changePhoto');

        Route::get('/edit-password',[ProfileController::class,'editPassword'])->name('profile.edit.password');
        Route::post('/change-password',[ProfileController::class,'changePassword'])->name('profile.changePassword');

        Route::get('/edit-name-and-email',[ProfileController::class,'editNameEmail'])->name('profile.edit.name.email');
        Route::post('/change-name',[ProfileController::class,'changeName'])->name('profile.changeName');
        Route::post('/change-email',[ProfileController::class,'changeEmail'])->name('profile.changeEmail');
    });
});
