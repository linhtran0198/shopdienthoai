 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
 <div class="panel panel-default">
    
    <div class="panel-heading">
      Liệt Kê Đơn hàng
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên người đặt hàng</th>
            <th>Tổng tiền</th>
            <th >Tình trạng</th>
             <th >Action</th>
            <!-- <th style="width:30px;"></th> -->
          </tr>
        </thead>
        <tbody>
          @foreach($all_orders as $key => $order )
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$order -> customer_name}}</td>
            <td>{{$order -> order_total}}</td>
            <td>{{$order -> order_status}}</td>
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-eye" style="margin-right:20px; font-size: 30px"></i>
              </a>
              <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text " style="font-size:30px;"></i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection