<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{   
    public function checkLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
    	return view('admin-login');
    }
    public function show_dashboard(){
        $this->checkLogin();
    	return view('admin.dashboard');
    }
    public function login(Request $req){
    	$email = $req->Email;
    	$passwd =$req->Password;

    	$rs = DB::table('admins')->where('email',$email)->where('password',$passwd)->first();
    	
    	if($rs){
    		Session::put('name',$rs->name);
            Session::put('id',$rs->id);
    		Session::put('msg','Đăng nhập thành công!');
    		return Redirect::to('/dashboard');

    	}else{
    		Session::put('msg','Mật khẩu hoặc tài khoản không đúng ! Mời nhập lại');
    		return Redirect::to('admin');
    	}
    }
    public function logout(){
        $this->checkLogin();
    	Session::put('name',null);
    	Session::put('msg',null);
    	return Redirect::to('/admin');

    }
}
