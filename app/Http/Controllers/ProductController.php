<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function add_product(){
    	return view('admin.add-product');
    }
    public function show_product(){
    	$all = DB::table('products')->get();
    	$manager = view('admin.show-product')->with('all_pro',$all);
    	return view('admin-layout')->with('all_pro',$manager);
    }
    public function save_product(Request $req){
		$data = array();
		$data['pro_name']=$req->name;
		$data['pro_author_id']=$req->id_author;
        $data['pro_price']=$req->price;
        $data['pro_active']=$req->status;
        $data['pro_category_id']=$req->brand;
        $data['pro_content']=$req->content;

        $get_image = $req->file('images');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = "images/".$name_image.rand(20,1000).".".$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/images',$new_image);
            $data['pro_view']=$new_image;
            DB::table('products')->insert($data);
            Session::put('msg','Thêm sản phẩm thành công!');
            return Redirect::to('show-product');
        }else{
        $data['pro_view']="";
		DB::table('products')->insert($data);
		Session::put('msg','Thêm sản phẩm thành công!');
		return Redirect::to('show-product');}
    }
    public function unactive_product($pro_id){
        DB::table('products')->where('id',$pro_id)->update(['pro_active'=>1]);
        Session::put('msg','Kích hoạt thành công!');
        return Redirect::to('show-product');
    }
    public function active_product($pro_id){
        DB::table('products')->where('id',$pro_id)->update(['pro_active'=>0]);
        Session::put('msg','Tắt kích hoạt thành công!');
        return Redirect::to('show-product');
    }
    public function edit_product($pro_id){
        $edit = DB::table('products')->join('admins','products.pro_author_id', '=','admins.id')->where('products.id',$pro_id)->get();
        $manager = view('admin.edit-product')->with('edit_pro',$edit);
        return view('admin-layout')->with('edit_pro',$manager);
    }
    public function delete_product($pro_id){
        $delete = DB::table('products')->where('id',$pro_id)->delete();
        if($delete){
            Session::put('msg','Xóa sản phẩm thành công!');
            return Redirect::to('show-product');
        }else{
            Session::put('msg','Xóa sản phẩm thất bại!');
            return Redirect::to('show-product');
        }
    }
    public function update_product(Request $req,$pro_id){
        $data = array();
        $data['pro_name']=$req->name;
        $data['pro_author_id']=$req->id_author;
        $data['pro_price']=$req->price;
        $data['pro_category_id']=$req->brand;
        $data['pro_content']=$req->content;
        $data['pro_number']=$req->number;
        $data['pro_sale']=$req->sale;
        DB::table('products')->where('id',$pro_id)->update($data);
        Session::put('msg','Cập nhật thành công!');
        return Redirect::to('show-product');
    }
    
}
