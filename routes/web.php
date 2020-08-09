<?php

use Illuminate\Support\Facades\Route;



// Fontend Routes
Route::prefix('/')->namespace('Web\Fontend')->group(function () {
    Route::get('/', 'HomeController@home')->name('website');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/category', 'HomeController@category')->name('category');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/singlepost/{slug}', 'HomeController@post')->name('singlepost');
});

// Backend Routes
Route::prefix('/admin')->namespace('Web\Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
