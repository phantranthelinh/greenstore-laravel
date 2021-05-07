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
//Home 
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/index', 'HomeController@index');
Route::get('/product','HomeController@all_product');
Route::get('/account','HomeController@account');
Route::get('/search','HomeController@search');


//Admin
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/dashboard','AdminController@login');
Route::get('/logout','AdminController@logout');
//Brands
Route::get('/add-brand','BrandProduct@add_brand');
Route::get('/edit-brand={b_id}','BrandProduct@edit_brand');
Route::get('/delete-brand={b_id}','BrandProduct@delete_brand');
Route::get('/show-brand','BrandProduct@show_brand');
Route::get('/unactive-brand={b_id}','BrandProduct@unactive_brand');
Route::get('/active-brand={b_id}','BrandProduct@active_brand');
Route::post('/save-brand','BrandProduct@save_brand');
Route::post('/update-brand={b_id}','BrandProduct@update_brand');
//Products
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product={pro_id}','ProductController@edit_product');
Route::get('/delete-product={pro_id}','ProductController@delete_product');
Route::get('/show-product','ProductController@show_product');
Route::get('/unactive-product={pro_id}','ProductController@unactive_product');
Route::get('/active-product={pro_id}','ProductController@active_product');
Route::post('/save-product','ProductController@save_product');
Route::post('/update-product={pro_id}','ProductController@update_product');
