<?php

use Illuminate\Support\Facades\Route;



// Fontend Routes
Route::prefix('/')->namespace('Web\Fontend')->group(function () {
    Route::get('/', 'HomeController@home')->name('website');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/category/{slug}', 'HomeController@category')->name('category');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/singlepost/{slug}', 'HomeController@post')->name('singlepost');
});

// Backend Routes
Route::prefix('/admin')->namespace('Web\Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('users', 'UserController');
    Route::get('profile', 'UserController@profile')->name('user.profile');
    Route::post('profile-update', 'UserController@profileUpdate')->name('user.profile.update');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
