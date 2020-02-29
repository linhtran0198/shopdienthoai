<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    //
    public function index(){
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();
		$all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id')->get();

		return view('pages.home')->with('category',$cate_product)->with('all_product',$all_product);
    }
    public function searchProducts(Request $request){
    	$keyword_search = $request->keyword_search;
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();
		$result_search = DB::table('tbl_product')->where('product_name','like', '%'.$keyword_search.'%')->get();

		return view('pages.sanpham.timkiem_sanpham')->with('category',$cate_product)->with('result_search',$result_search);
    }
    
}
