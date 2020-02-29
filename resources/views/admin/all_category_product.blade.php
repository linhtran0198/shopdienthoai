 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
 <div class="panel panel-default">
    
    <div class="panel-heading">
      Liệt Kê Danh Mục Sản Phẩm
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
            <th>Tên Danh Mục</th>
            <th>Trạng thái</th>
            <th >Thao tác</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category_product as $key => $cate_pro )
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_pro -> category_name}}</td>
            <td><span class="text-ellipsis">
                  <?php
               if($cate_pro->category_status==0){
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-check" style="font-size: 25px; color: green;"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="font-size: 25px;"></span></a>
                <?php
               }
              ?>
            </span>
      
            </td>
            <td>
              <a href="{{URL::to('/view-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-eye" style="margin-right:20px; font-size: 25px"></i>
                </a>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active" style="margin-right:20px; font-size: 30px"></i>
              </a>
              <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
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