<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use Illuminate\Support\Facades\Route;

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
    return view('guest.home');
});

Auth::routes();

Route::prefix('admin')
    ->namespace('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('/post', 'PostController');
        Route::resource('/category', 'CategoryController');
        Route::put('/post/{id}/clearCategory', 'PostController@removeCategoryFromPost')->name('removeCategoryFromPost');
    });
// Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('admin/post', 'admin\PostController');
