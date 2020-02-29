@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
	<div class="col-sm-4">
		<div class="view-product">
			<img src="{{URL::to('/public/uploads/product_images/'.$value->product_img)}}" alt=""  style="height: 285px;" />
		</div>

	</div>
	<div class="col-sm-8">
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2>{{$value->product_title}}</h2>
			<form action="{{URL::to('/gio-hang')}}" method="POST">
				{{csrf_field()}}
				<span>
					<span>{{number_format($value->product_price).' '. 'đ'}} </span>
					<label>Số Lượng:</label>
					<input name="qty" type="number" minlength="1" value="1" />
					<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Thêm vào giỏ hàng
					</button>
				</span>
			</form>
			<p><b>Tình Trạng:</b> Còn Hàng</p>
			<p><b>Hãng sản xuất:</b> {{$value->category_name}} </p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Thông tin sản phẩm</a></li>
			<li ><a href="#companyprofile" data-toggle="tab">Mô tả sản phẩm</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="details" >
			<p><b>Tên sản phẩm:</b> {{$value->product_name}}</p>
			<p><b>Giá:</b> {{number_format($value->product_price).' '. 'đ'}} </p>
			<p><b>Hệ điều hành:</b> {{$value->product_os}}</p>
			<p><b>CPU:</b> {{$value->product_cpu}}</p>
			<p><b>Camera:</b> {{$value->product_camera}}</p>
			<p><b>RAM:</b> {{$value->product_ram}}</p>
			<p><b>Màn Hình:</b> {{$value->product_screen}}</p>
			<p><b>Dung lượng Pin:</b> {{$value->product_pin}}</p>
		</div>
		<div class="tab-pane fade " id="companyprofile" >
			{{$value->product_desc}}
		</div>

	</div>
	
</div><!--/category-tab-->
@endforeach

@endsection