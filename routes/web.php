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

//Route::get('/Home','PagesController@index');

Route::get('/about','PagesController@about')->name('aboutpage');

Route::get('/contact','PagesController@contact')->name('contactpage');

Route::post('/dosend','PagesController@dosend')->name('dosend');

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');

Route::resource('posts','PostsController');

Route::resource('tags','TagsController')->only(['show']);


Auth::routes();

Route::get('user/verify/{token}', 'Auth\RegisterController@verifyEmail');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Home', 'HomeController@index')->name('home');
