<?php

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

//middleware untuk guest
Route::group(['middleware' => 'guestMiddleware'], function () {
    Route::get('/','ProductController@index');
    Route::get('/product/{id}','ProductController@product');
});

//middleware pertama ini untuk cek user authenticated (login) tau belum, kalau sudah dia bisa akses route /user
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user-no-access','NoAccessController@userNoAccess');
    Route::get('/admin-no-access','NoAccessController@adminNoAccess');

    //middleware ini nested karena untuk cek logged in user punya role user atau tidak, kalau punya, ser bisa akses route /user
    Route::group(['middleware' => 'user'], function () {
        Route::get('/user-page','ProductController@index');
    });

    //middleware kedua nested karena untuk cek logged in user punya role admin atau tidak, kalau punya, user bisa akses route /admin
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin-page','ProductController@index_admin');
    });
});