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
    return 'aa';
})->name('home');
Route::view('/signin', 'admin.auth.signin')->name('signin.view');
Route::post('signin', 'AuthController@signin')->name('signin');
Route::post('signout', 'AuthController@signout')->name('signout');

Route::prefix('admin')->group(function () {
    Route::get('/post', 'Admin\PostController@index')->name('admin.post.index');


    // Category group
    Route::get('/category', 'Admin\CategoryController@index')->name('admin.category.index');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('admin.category.create');
    Route::post('/category/store', 'Admin\CategoryController@store')->name('admin.category.store');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
    Route::put('/category/{id}', 'Admin\CategoryController@update')->name('admin.category.update');
    Route::delete('/category/{id}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');
});
