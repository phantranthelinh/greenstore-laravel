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
Route::get('home', 'HomeController@index');
//Admin
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/dashboard','AdminController@login');
Route::get('/logout','AdminController@logout');
//Categories
Route::get('/add-categories','CategoryProduct@add_categories');
Route::get('/edit-categories={cate_id}','CategoryProduct@edit_categories');
Route::get('/delete-categories={cate_id}','CategoryProduct@delete_categories');
Route::get('/show-categories','CategoryProduct@show_categories');
Route::get('/unactive-cate={cate_id}','CategoryProduct@unactive_categories');
Route::get('/active-cate={cate_id}','CategoryProduct@active_categories');
Route::post('/save-categories','CategoryProduct@save_categories');
Route::post('/update-categories={cate_id}','CategoryProduct@update_categories');