<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
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
    public function add_product(){
        $this->check();
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();

    	return view('admin.add_product')->with('cate_product', $cate_product);
    }
    public function all_product(){
        $this->check();
    	$all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->orderby('tbl_product.product_id','desc')->get();
    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        $this->check();
    	$data = array();
    	$data['product_title'] = $request->product_title;
    	$data['category_id'] = $request->product_cate;
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_os'] = $request->product_os;
    	$data['product_cpu'] = $request->product_cpu;
    	$data['product_camera'] = $request->product_camera;
    	$data['product_screen'] = $request->product_screen;
    	$data['product_ram'] = $request->product_ram;
    	$data['product_pin'] = $request->product_pin;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_status'] = $request->product_status;
    	$data['product_img'] = $request->product_img;
    	$get_image = $request->file('product_img');
    	if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product_images',$new_image);
            $data['product_img'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $data['product_img'] = ' ';
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->check();
        //$this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt  sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
        $this->check();
        //$this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->check();
    	$cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();
    	$edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
      public function update_product(Request $request,$product_id ){
        $this->check();
    	$data = array();
    	$data['product_title'] = $request->product_title;
    	$data['category_id'] = $request->product_cate;
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_os'] = $request->product_os;
    	$data['product_cpu'] = $request->product_cpu;
    	$data['product_camera'] = $request->product_camera;
    	$data['product_screen'] = $request->product_screen;
    	$data['product_ram'] = $request->product_ram;
    	$data['product_pin'] = $request->product_pin;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_status'] = $request->product_status;
    	$data['product_img'] = $request->product_img;
    	//$data['category_status'] = $request->category_product_status;
    	$get_image = $request->file('product_img');
    	if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product_images',$new_image);
            $data['product_img'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','Cập nhật sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->check();
    	DB::table('tbl_product')->where('product_id', $product_id)->delete();
    	Session::put('message',"Xóa  sản phẩm thành công!");
    	return Redirect::to('all-product');
    }

    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();
        $details_product = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.product_id',$product_id)->get();
           return view('pages.sanpham.chitiet_sanpham')->with('category',$cate_product)->with('product_details',$details_product);
    }
    public function view_product($product_id){
        $this->check();
        $pro_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('product_id', $product_id)->get();
        $v_product_id = view('admin.view_product')->with('pro_id', $pro_id);
        return view('admin_layout')->with('admin.view_product',$v_product_id);
    }
}
