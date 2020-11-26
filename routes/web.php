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
Route::get('/','ProductController@index');
Route::get('/product/{id}','ProductController@product');

Auth::routes();

//middleware pertama ini untuk cek user autehnticated atau belum, kalau sudah dia bisa akses route /user
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', function () {
        return 'User Page';
    });

    //middleware kedua nested karena untuk cek logged in user punya role admin atau tidak, kalau punya user bisa akses route /admin
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', function () {
            return 'Admin Page';
        });
    });
});