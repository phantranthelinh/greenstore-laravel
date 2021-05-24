<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{

    public function save_cart(Request $req){
    	$pro_id = $req->pro_id;
    	$quantity =$req->qty;
    	$size_pro = $req->size_product;
    	$product_info = DB::table('products')->where('products.id',$pro_id)->first();
    	$data['id']=$pro_id;
    	$data['qty']=$quantity;
    	$data['name']=$product_info->pro_name;
    	$data['price']=$product_info->pro_price;
    	$data['weight']=$size_pro;
    	$data['options']['image']=$product_info->pro_view;
    	Cart::add($data);
        Session::put('msg','Thêm vào giỏ hàng thành công!');
    	return Redirect()->Route('product_detail',[$pro_id]);
    }
    public function show_cart(){
    	$categories = DB::table('categories')->where('c_active','1')->get();
    	return view('cart.show-cart')->with('categories',$categories);
    }
    public function remove_cart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('show-cart');
    }
    public function update_cart_qty(Request $req){
    	$rowId = $req->rowId_cart;
    	$qty = $req->qty;
    	Cart::update($rowId,$qty);
    	return Redirect::to('show-cart');

    }
}
