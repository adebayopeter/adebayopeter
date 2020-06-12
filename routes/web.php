<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/aboutme', 'HomeController@aboutme')->name('aboutme');

Route::get('/projects', 'HomeController@projects')->name('projects');

Route::get('/blog', 'HomeController@blog')->name('blog');

Route::get('/gallery', 'HomeController@gallery')->name('gallery');

Route::get('/contact', 'HomeController@contact')->name('contact');


// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('admin', 'AdminController@index')->name('admin');
Route::resource('admin/clients', 'ClientsController');
Route::resource('admin/app_categories', 'AppCategoryController');
Route::resource('admin/applications', 'ApplicationController');