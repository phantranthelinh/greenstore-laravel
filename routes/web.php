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
Route::post('/search','HomeController@search');
//Brand

Route::get('/brand={id}','BrandProduct@show_brand_home');
Route::get('/product-detail={id}','ProductController@product_detail')->name('product_detail');



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

//cart

Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/remove-cart={rowId}','CartController@remove_cart');
Route::post('/update-cart-qty','CartController@update_cart_qty');

//Checkout 
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::post('/login','CheckoutController@login');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-user','CheckoutController@add_user');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout','CheckoutController@save_checkout');
Route::get('/payment','CheckoutController@payment');
//Order
Route::post('/order','CheckoutController@order');
Route::get('/show-order','CheckoutController@show_order');
//Manager order 

Route::get('/manager-order','CheckoutController@manager_order');
Route::get('/view-order={orderId}','CheckoutController@view_order');