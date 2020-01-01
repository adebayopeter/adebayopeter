<?php

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
    return view('home');
});

Route::get('/aboutme', function () {

    return view('aboutme');
});

Route::get('/projects', function () {

    return view('projects');
});

Route::get('/blog', function () {

    return view('blog');
});

Route::get('/gallery', function () {

    return view('gallery');
});

Route::get('/contact', function () {

    return view('contact');
});

Route::get('/cv', function() {

    return view('cv');
});