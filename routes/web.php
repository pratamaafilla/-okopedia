<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','ProductController@index');

//middleware pertama ini untuk cek user authenticated (login) tau belum, kalau sudah dia bisa akses route /user
Route::group(['middleware' => 'auth'], function () {
    //middleware kedua nested karena untuk cek logged in user punya role admin atau tidak, kalau punya user bisa akses route /admin
    Route::get('/user-no-access','NoAccessController@userNoAccess');
    Route::get('/admin-no-access','NoAccessController@adminNoAccess');

    Route::get('/product/{id}','ProductController@product');
    Route::post('/product/{id}','CartController@add_to_cart');

    Route::get('/cart','CartController@index');
    Route::get('/cart/delete/{id}','CartController@delete');
    Route::get('/cart/{id}','CartController@update');

    //middleware kedua nested karena untuk cek logged in user punya role admin atau tidak, kalau punya, user bisa akses route /admin
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin-page','ProductController@index_admin');
        Route::get('/delete/{id}','ProductController@index_admin_delete');
        Route::get('/admin/category_list','ProductController@index_admin_categorylist');
        Route::get('/admin/category_list/{id}','ProductController@search_product_by_category');

        Route::get('/admin/add_product','ProductController@index_admin_addproduct');
        Route::post('/admin/add_product/upload','ProductController@upload_product');

        Route::get('/admin/add_category','ProductController@index_admin_addcategory');
        Route::post('/admin/add_category/upload','ProductController@upload_category');
    });
});