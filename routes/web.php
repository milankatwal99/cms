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

Route::get('/','WelcomeController@index')->name('welcome');


Auth::routes();

Route::middleware(['auth'])->group(function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/category','CategoryController');

    Route::resource('/post','PostController');
    Route::get('/trash',"PostController@trashed")->name('post.trash');

    Route::put('/restore/{id}',"PostController@restore")->name('post.restore');

    Route::resource('/tag','TagController');

});

Route::middleware(['auth','admin'])->group(function() {
    Route::get('user', 'UsersController@index')->name('user.index')->middleware('auth');

    Route::post('admin/change/{id}','UsersController@change')->name('user.change');

    Route::get('/user/editprofile','UsersController@editprofile')->name('user.profile');

    Route::put('/user/updateprofile/{value}','UsersController@updateProfile')->name('update.profile');
});