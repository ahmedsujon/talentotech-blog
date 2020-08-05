<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/')->namespace('Web\Admin')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
