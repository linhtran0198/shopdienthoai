@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin người mua hàng
    </div>
    <div class="table-responsive">
   <?php
      $message = Session::get('message');
      if($message){
          echo '<span class="text-alert" style="color:green;">'.$message.'</span>';
          Session::put('message',null);
      }
   ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Tên người đặt hàng</th>
            <th>SĐT</th>
            <th>Email</th>
             <th style="width:30px;"></th>  
          </tr>
        </thead>
        <tbody>
          @foreach($order_by_id as $key => $v_order)
          <tr>
            <td>{{$v_order->customer_name}}</td>
            <td>{{$v_order->customer_phone}}</td>
            <td>{{$v_order->customer_email}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
 <div class="table-agile-info">
  <div class="panel panel-default">
    
    <div class="panel-heading">
      Thông tin đơn hàng
    </div>
    <div class="table-responsive">
   <?php
      $message = Session::get('message');
      if($message){
          echo '<span class="text-alert" style="color:green;">'.$message.'</span>';
          Session::put('message',null);
      }
   ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Tên sản phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th >Tổng tiền</th>
             <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_by_id as $key => $v_order)
          <tr>
            <td>{{$v_order->product_name}}</td>
            <td>{{$v_order->product_sales_quantity}}</td>
            <td>{{number_format($v_order->product_price).' '.'đ'}}</td>
            <td>{{number_format($v_order->product_sales_quantity * $v_order->product_price).' '. 'đ'}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
 <div class="table-agile-info">
  <div class="panel panel-default">
    
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>
    <div class="table-responsive">
   <?php
      $message = Session::get('message');
      if($message){
          echo '<span class="text-alert" style="color:green;">'.$message.'</span>';
          Session::put('message',null);
      }
   ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th >SĐT</th>
             <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_by_id as $key => $v_order)
          <tr>
            <td>{{$v_order->shipping_name}}</td>
            <td>{{$v_order->shipping_address}}</td>
            <td>{{$v_order->shipping_phone}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection