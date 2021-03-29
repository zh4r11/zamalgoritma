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

Route::get('/dashboard', function () {
    return view('index');
});

Route::get('/', 'Authentication\AuthController@index')->name('login');
Route::post('/loginPost', 'Authentication\AuthController@loginPost')->name('loginpost');
Route::get('/logout', 'Authentication\AuthController@logout')->name('logout');

Route::group(['middleware' => 'ceklogin'], function(){
    Route::get('user/add', 'UserController@create')->name('adduser');
    Route::post('user/save', 'UserController@store')->name('saveuser');
    Route::get('user', 'UserController@index')->name('user');
    Route::delete('user/{id}', 'UserController@destroy')->name('deleteuser');
    Route::get('user/{id}/edit', 'UserController@edit')->name('edituser');
    Route::patch('user/{id}', 'UserController@update')->name('updateuser');

    Route::get('raw', 'DataController@indexRAW')->name('raw');

    Route::get('product', 'ProductController@index')->name('product');
    Route::get('product/add', 'ProductController@create')->name('addproduct');
    Route::post('product/save', 'ProductController@store')->name('saveproduct');
    Route::delete('product/{id}', 'ProductController@destroy')->name('deleteproduct');
    Route::get('product/{id}/edit', 'ProductController@edit')->name('editproduct');
    Route::patch('product/{id}', 'ProductController@update')->name('updateproduct');
});
