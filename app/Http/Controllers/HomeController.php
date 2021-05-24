<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
    	$slides = DB::table('slides')->get();
    	$categories = DB::table('categories')->where('c_active','1')->get();
    	$pro_new = DB::table('products')->where('pro_active','1')->orderby('created_at','asc')->limit(4)->get();
    	$pro_sale = DB::table('products')->where('pro_active','1')->where('pro_sale','>0')->limit(8)->get();
    	$pro_hot = DB::table('products')->where('pro_active','1')->where('pro_hot','1')->limit(4)->get();
    	return view('welcome')->with('slides',$slides)->with('categories',$categories)->with('pro_new',$pro_new)->with('pro_sale',$pro_sale)->with('pro_hot',$pro_hot);
    }
    public function all_product(){
    	$categories = DB::table('categories')->where('categories.c_active','1')->get();
    	$pro = DB::table('products')->where('pro_active','1')->orderby('created_at','asc')->get();
    	return view('products')->with('pro',$pro)->with('categories',$categories);
    }
    public function account(){
    	$categories = DB::table('categories')->where('c_active','1')->get();
    	return view('account')->with('categories',$categories);
    }
    public function search(Request $req){
        $keywords = $req->search;
        Session::put('keywords',$keywords);
    	$categories = DB::table('categories')->where('categories.c_active','1')->get();
        $search_pro = DB::table('products')->where('pro_active','1')->where('pro_name','like','%'.$keywords.'%')->orderby('created_at','asc')->get();
        $i=0;
        foreach ($search_pro as $count) {
            $i+=1;
        }
        Session::put('sl',$i);
        return view('pages.search')->with('pro',$search_pro)->with('categories',$categories);
    }

}
