<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class CheckoutController extends Controller
{
    public function login_checkout(){
    	$categories = DB::table('categories')->where('c_active','1')->get();
    	return view('login-checkout')->with('categories',$categories);
    }
   
    public function add_user(Request $req){
    	$data=array();
    	$data['email']=$req->email;
    	$data['password']=md5($req->pass);
    	$data['name']=$req->name;

    	$id_user = DB::table('users')->insertGetId($data);
    	Session::put('id_user',$id_user);
    	Session::put('name_user',$req->name);
    	return Redirect::to('checkout');
    }
	public function checkout(){
		$categories = DB::table('categories')->where('c_active','1')->get();
        $id_user = Session::get('id_user');
        $users = DB::table('users')->where('users.id',$id_user)->get();
		return view('checkout.checkout')->with('categories',$categories)->with('users',$users);
    }
    public function save_checkout(Request $req){
    	$data=array();
    	$data['tr_email_user']=$req->email;
        $data['tr_user_id']=$req->id_user;
    	$data['tr_user_name']=$req->name;
    	$data['tr_phone']=$req->phone_number;
    	$data['tr_address']=$req->address;
    	$data['tr_note']=$req->notes;


    	$shipping_id = DB::table('transactions')->insertGetId($data);
    	Session::put('shipping_id',$shipping_id);
    	return Redirect::to('/payment');
    }
    public function payment(){
        $categories = DB::table('categories')->where('c_active','1')->get();
        return view('checkout.payment')->with('categories',$categories);
    }
    public function logout_checkout(){
    	Session::flush();
    	return Redirect::to('login-checkout');
    }
    public function login(Request $req){
    	$email = $req->email;
    	$passwd = md5($req->pass);
    	$rs = DB::table('users')->where('email',$email)->where('password',$passwd)->first();
        Session::put('id_user',$rs->id);
        $content = Cart::content();
        if($content->isEmpty()){
            return Redirect::to('index');
        }else{return Redirect::to('checkout');}
    }
    public function order(Request $req){
        //Payment
        $data=array();
        $data['payment_method']=$req->checkbox_payment;
        $data['payment_status']='Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);
        //Order
        $or_data=array();
        $or_data['or_user_id']=Session::get('id_user');
        $or_data['or_transaction_id']=Session::get('shipping_id');
        $or_data['or_payment_id']=$payment_id;
        $or_data['or_total']=Cart::subtotal();
        $or_data['or_status']='Đang chờ xử lý';
        $order_id = DB::table('orders')->insertGetId($or_data);

        //Order detail 
        $od_data=array();
        $content = Cart::content();
        foreach($content as $value){
        $od_data['od_order_id']=$order_id;
        $od_data['od_user_id']=Session::get('id_user');
        $od_data['od_pro_id']=$value->id;
        $od_data['od_pro_name']=$value->name;
        $od_data['od_pro_price']=$value->price;
        $od_data['od_pro_qty']=$value->qty;

        $order_detail = DB::table('order_detail')->insert($od_data);
        }
        Cart::destroy();
        
        return Redirect::to('show-order');
    }
    public function show_order(){
         $categories = DB::table('categories')->where('c_active','1')->get();
         $id_user = Session::get('id_user');
         $rs = DB::table('order_detail')->join('users','order_detail.od_user_id','=','users.id')
         ->join('products','order_detail.od_pro_id','=','products.id')
         ->join('transactions','order_detail.od_user_id','=','transactions.tr_user_id')
         ->join('orders','orders.id','=','order_detail.od_order_id')
         ->join('payment','payment.payment_id','=','orders.or_payment_id')
         ->where('order_detail.od_user_id',$id_user)->orderby('order_detail.od_created_at','asc')->limit(1)->get();
        return view('checkout.show-order')->with('categories',$categories)->with('ur_order',$rs);
    
    }

    //admin 
     public function checkLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function manager_order(){
        $this->checkLogin();
        $rs = DB::table('orders')->join('users','orders.or_user_id','=','users.id')
         ->orderby('orders.created_at','desc')->select('orders.id','users.name','orders.or_total','orders.created_at','orders.or_status')->get();
        $manager = view('admin.manager-order')->with('all_order',$rs);
        return view('admin-layout')->with('all_order',$manager);
    
    }
    public function view_order($orderId){
        $this->checkLogin();
        $rs = DB::table('orders')->join('users','orders.or_user_id','=','users.id')
         ->orderby('orders.created_at','desc')->select('orders.id','users.name','orders.or_total','orders.created_at','orders.or_status')->get();
        $manager = view('admin.view-order')->with('all_order',$rs);
        return view('admin-layout')->with('all_order',$manager);
    }
}
