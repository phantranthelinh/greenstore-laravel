<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function add_categories(){
    	return view('admin.add-categories');
    }
    public function show_categories(){
    	$all = DB::table('categories')->get();
    	$manager_cate = view('admin.show-categories')->with('all_cate',$all);
    	return view('admin-layout')->with('all_cate',$manager_cate);
    }
    public function save_categories(Request $req){
		$data = array();
		$data['c_name']=$req->name_cate;
		$data['c_active']=$req->status; 
		$data['c_name_author']=$req->name_author;
		$data['c_author_id']=$req->id_author;


		DB::table('categories')->insert($data);
		Session::put('msg','Thêm nhãn hiệu thành công!');
		return Redirect::to('show-categories');
    }
    public function unactive_categories($cate_id){
    	DB::table('categories')->where('id',$cate_id)->update(['c_active'=>1]);
    	Session::put('msg','Kích hoạt thành công!');
    	return Redirect::to('show-categories');
    }
    public function active_categories($cate_id){
    	DB::table('categories')->where('id',$cate_id)->update(['c_active'=>0]);
    	Session::put('msg','Tắt kích hoạt thành công!');
    	return Redirect::to('show-categories');
    }
    public function edit_categories($cate_id){
    	$edit = DB::table('categories')->where('id',$cate_id)->get();
    	$manager_cate = view('admin.edit-categories')->with('edit_cate',$edit);
    	return view('admin-layout')->with('edit_cate',$manager_cate);
    }
    public function delete_categories($cate_id){
    	DB::table('categories')->where('id',$cate_id)->delete();
		Session::put('msg','Xóa thành công!');
		return Redirect::to('show-categories');
    }
    public function update_categories(Request $req,$cate_id){
    	$data = array();
    	$data['c_name']=$req->name_cate;
		$data['c_active']=$req->status; 
		$data['c_name_author']=$req->name_author;
		$data['c_author_id']=$req->id_author;
		DB::table('categories')->where('id',$cate_id)->update($data);
		Session::put('msg','Cập nhật thành công!');
		return Redirect::to('show-categories');
    }
}
