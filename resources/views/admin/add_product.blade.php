 @extends('admin_layout')
 @section('admin_content')

 <div class="row">
    <div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm Sản Phẩm
        </header>
        <div class="panel-body">
            <?php
                $message    = Session::get('message');
                if($message){
                    echo $message,
                    Session::put('message',null);
                }
            ?>
            <div class="position-center">
                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề sản phẩm</label>
                    <input type="text" name="product_title" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Danh mục</label>
                    <select class="form-control input-sm m-bot15" name="product_cate">
                        @foreach($cate_product as $key => $category)
                        <option value="{{$category -> category_id}}">{{$category -> category_name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên sản phẩm</label>
                    <input  type="text" name="product_name" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hình ảnh </label>
                    <input  type="file" name="product_img" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gía sản phẩm</label>
                    <input  type="text" name="product_price" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hệ điều hành</label>
                    <input  type="text" name="product_os" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">CPU</label>
                    <input  type="text" name="product_cpu" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Camera</label>
                    <input  type="text" name="product_camera" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Màn hình</label>
                    <input  type="text" name="product_screen" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">RAM</label>
                    <input  type="text" name="product_ram" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Dung lượng Pin</label>
                    <input  type="text" name="product_pin" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></input>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả </label>
                    <textarea  type="text" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                </div>
               <div class="form-group">
                    <label for="exampleInputFile">Hiển thị</label>
                    <select class="form-control input-sm m-bot15" name="product_status">
                        <option value="0">ẩn</option>
                        <option value="1">hiện</option>
                        
                    </select>
                </div>
               
                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
            </form>
            </div>

        </div>
    </section>

    </div>
</div>
@endsection