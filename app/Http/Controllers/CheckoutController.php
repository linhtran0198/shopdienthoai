<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Validator;
class CheckoutController extends Controller
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
    public function login_checkout(){
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();

    	return view('pages.thanhtoan.login_checkout')->with('category',$cate_product);
    }

    public function add_customer(Request $request){
         $v = Validator::make($request->all(), [
        'customer_name' => 'required',
        'customer_email' => 'required',
        'customer_password' => 'required',
        'customer_phone' => 'required',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;

    	$data['customer_password'] = md5($request->customer_password);

    	$data['customer_phone'] = $request->customer_phone;

    	$customer_id = DB::table('tbl_customers')->insertGetId($data);
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return Redirect::to('/checkout');

    }

    public function checkout()
    {
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();

    	return view('pages.thanhtoan.checkout')->with('category',$cate_product);
    }

     public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;

        $data['shipping_address'] = $request->shipping_address;

        $data['shipping_phone'] = $request->shipping_phone;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');

    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();
        return view('pages.thanhtoan.payment')->with('category',$cate_product);

    }
    public function order_place(Request $request){
    //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_options;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_orders')->insertGetId($order_data);

        //insert order details
        $content = Cart::content();
        foreach ($content as $value_content) {
            $order_details_data = array();
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $value_content->id;
            $order_details_data['product_name'] = $value_content->name;
            $order_details_data['product_price'] = $value_content->price;
            $order_details_data['product_sales_quantity'] = $value_content->qty;
            DB::table('tbl_order_details')->insertGetId($order_details_data); 
        }
        if($data['payment_method'] == 1){
            echo "Trả qua thẻ ATM";
        }else{
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id')->get();
            return view('pages.thanhtoan.thanhtoan_tienmat')->with('category',$cate_product);

        }
        //return Redirect::to('/payment');

    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    } 
    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
       
        if ($result) {
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
          
    }
    public function manage_order(){
         $this->check();
        $all_orders = DB::table('tbl_orders')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_orders.customer_id')
        ->select('tbl_orders.*','tbl_customers.customer_name')
        ->orderby('tbl_orders.order_id','desc')->get();
        $manager_orders = view('admin.manage_orders')->with('all_orders',$all_orders);
        return view('admin_layout')->with('admin.manage_orders',$manager_orders);
    }

     public function view_order($order_id){
        $this->check();
        $order_by_id = DB::table('tbl_orders')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_orders.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_orders.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_orders.order_id')
        ->select('tbl_orders.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->get();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
     }
     public function delete_order($order_id){
         $this->check();
        DB::table('tbl_orders')->where('order_id', $order_id)->delete();
        Session::put('message',"Xóa đơn hàng thành công!");
        return Redirect::to('manage-order');
     }
}

