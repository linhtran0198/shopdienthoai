<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    //
    public function check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->check();
    	return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->check();
    	$all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){
        $this->check();
    	$request->validate([
    'category_product_name' => 'required',
]);
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;
    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message',"Thêm danh mục sản phẩm thành công!");
    	return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
        //$this->AuthLogin();
        $this->check();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }
    public function active_category_product($category_product_id){
        //$this->AuthLogin();
        $this->check();
        
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->check();
    	$edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
    	$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
      public function update_category_product(Request $request,$category_product_id ){
        $this->check();
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	//$data['category_status'] = $request->category_product_status;
    	DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
    	Session::put('message',"Cập nhật danh mục sản phẩm thành công!");
    	return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->check();
    	DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
    	Session::put('message',"Xóa danh mục sản phẩm thành công!");
    	return Redirect::to('all-category-product');
    }
//danh muc san pham 
    public function show_category_home($category_id){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();
      $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id',$category_id)->get();
      $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

      return view('pages.category.danhmuc_sanpham')->with('category',$cate_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }
     public function view_category_product($category_product_id){
        $this->check();
        $view_cate_prod_id = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $view_category_product = view('admin.view_category_product')->with('view_cate_prod_id',$view_cate_prod_id);
        return view('admin_layout')->with('admin.view_category_product',$view_category_product);
    }
}
