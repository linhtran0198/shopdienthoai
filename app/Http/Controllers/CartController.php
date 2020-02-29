<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
class CartController extends Controller
{
    //
    public function save_cart(Request $request)
    {	

    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	$product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
   		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();

   		$data['id'] = $product_info->product_id;
   		$data['qty'] = $quantity;
   		$data['name'] = $product_info->product_name;
   		$data['price'] = $product_info->product_price;
   		$data['weight'] = $product_info->product_price;
   		$data['options']['image'] = $product_info->product_img;
   		Cart::add($data);
   		return Redirect::to('/show-cart');
    	
    }
    public function show_cart(){
   		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();

    	return view('pages.giohang.show_cart')->with('category',$cate_product);
    }

    public function delete_cart($rowId){
      Cart::update($rowId,0);
      return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request){
      $rowId = $request->rowId_cart;
      $qty = $request->quantity_cart;
      Cart::update($rowId,$qty);
      return Redirect::to('/show-cart');
    }
}
