<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{   
    public function checkLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand(){
        $this->checkLogin();
    	return view('admin.add-brand');
    }
    public function show_brand(){
    	$all = DB::table('categories')->get();
    	$manager_cate = view('admin.show-brand')->with('all_cate',$all);
    	return view('admin-layout')->with('all_cate',$manager_cate);
    }
    public function save_brand(Request $req){
        $this->checkLogin();
		$data = array();
		$data['c_name']=$req->name_cate;
		$data['c_active']=$req->status; 
		$data['c_name_author']=$req->name_author;
		$data['c_author_id']=$req->id_author;

        $get_image = $req->file('images');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(20,1000).".".$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/brand',$new_image);
            $data['c_images']=$new_image;
            DB::table('categories')->insert($data);
            Session::put('msg','Thêm thương hiệu thành công!');
            return Redirect::to('show-brand');
        }else{
        $data['c_images']="";
        DB::table('categories')->insert($data);
        Session::put('msg','Thêm thương hiệu thành công!');
        return Redirect::to('show-brand');
    }
    
    }
    public function unactive_brand($b_id){
        $this->checkLogin();
    	DB::table('categories')->where('id',$b_id)->update(['c_active'=>1]);
    	Session::put('msg','Kích hoạt thành công!');
    	return Redirect::to('show-brand');
    }
    public function active_brand($b_id){
        $this->checkLogin();
    	DB::table('categories')->where('id',$b_id)->update(['c_active'=>0]);
    	Session::put('msg','Tắt kích hoạt thành công!');
    	return Redirect::to('show-brand');
    }
    public function edit_brand($b_id){
        $this->checkLogin();
    	$edit = DB::table('categories')->where('id',$b_id)->get();
    	$manager_cate = view('admin.edit-brand')->with('edit_cate',$edit);
    	return view('admin-layout')->with('edit_cate',$manager_cate);
    }
    public function delete_brand($b_id){
        $this->checkLogin();
    	DB::table('categories')->where('id',$b_id)->delete();
		Session::put('msg','Xóa thương hiệu thành công!');
		return Redirect::to('show-brand');
    }
    public function update_brand(Request $req,$b_id){
        $this->checkLogin();
    	$data = array();
    	$data['c_name']=$req->name_cate;
		$data['c_active']=$req->status; 
		$data['c_name_author']=$req->name_author;
		$data['c_author_id']=$req->id_author;
        $get_image = $req->file('images');
		if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(20,1000).".".$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/brand',$new_image);
            $data['c_images']=$new_image;
            DB::table('categories')->where('id',$b_id)->update($data);
            Session::put('msg','Cập nhật thương hiệu thành công!');
            return Redirect::to('show-brand');
        }
        $data['c_images']="";
        DB::table('categories')->where('id',$b_id)->update($data);
        Session::put('msg','Cập nhật thương hiệu thành công!');
        return Redirect::to('show-brand');
    }
}
