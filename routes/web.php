<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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
    return view('index');
})->name('index');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth','isAdmin']);

Route::resource('category',CategoryController::class);

Route::resource('article',ArticleController::class);

Auth::routes(['verify'=>true]);

// Route::resource('home',HomeController::class);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/editInfo', [App\Http\Controllers\HomeController::class, 'editInfo'])->name('home.edit');
Route::post('/updateInfo', [App\Http\Controllers\HomeController::class, 'updateInfo'])->name('home.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
