 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
 <div class="panel panel-default">
    
    <div class="panel-heading">
      Danh sách Sản Phẩm
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
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $prod )
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$prod -> product_name}}</td>
            <td>{{$prod -> category_name}}</td>
            <td>{{number_format($prod -> product_price).' '.' đ'}}</td>
            <td><img src="public/uploads/product_images/{{$prod -> product_img}}" height="100" width="100"></td>
            
            <!-- <td>{{$prod -> product_status}}</td> -->
            <td><span class="text-ellipsis">
                  <?php
               if($prod->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$prod->product_id)}}"><span class="fa-thumb-styling fa fa-check" style="font-size: 20px; color: green;"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$prod->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="font-size: 20px; color: red"></span></a>
                <?php
               }
              ?>
            </span>
      
            </td>
            <td>
                <a href="{{URL::to('/view-product/'.$prod->product_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-eye" style="margin-right:20px; font-size: 25px"></i>
                </a>
                <a href="{{URL::to('/edit-product/'.$prod->product_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:20px; font-size: 25px"></i>
                </a>
              <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" href="{{URL::to('/delete-product/'.$prod->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text " style="font-size:25px;"></i>
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