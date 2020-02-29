@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
	 <div class="panel panel-default">
	 	<div class="panel-heading">
	      Chi tiết sản phẩm
	    </div>
     <table class="table table-striped b-t b-light">
		@foreach($pro_id as $key => $prod)
		<tr>
			<th style="width: 170px;">Tiêu đề sản phẩm :</th>
			<td>{{ $prod ->product_title}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Tên Sản phẩm:</th>
			<td>{{ $prod -> product_name}}</td>

		</tr>
		<tr>
			<th style="width: 170px;">Hãng sản xuất :</th>
			<td>{{ $prod -> category_name}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Giá :</th>
			<td>{{number_format($prod ->product_price).' '.'đ'}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Hãng sản xuất :</th>
			<td>{{ $prod -> category_name}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Hệ điều hành :</th>
			<td>{{ $prod -> product_os}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Chíp xử lý(CPU) :</th>
			<td>{{ $prod -> product_cpu}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Camera:</th>
			<td>{{ $prod -> product_camera}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Màn hình :</th>
			<td>{{ $prod -> product_screen}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">RAM :</th>
			<td>{{ $prod -> product_ram}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Dung lượng Pin :</th>
			<td>{{ $prod -> product_pin}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Hình ảnh :</th>
			<td><img src="{{URL::to('public/uploads/product_images/'.$prod->product_img)}}" height="100" width="100"></td>
		</tr>
		<tr>
			<th style="width: 170px;">Mô tả :</th>
			<td>{{ $prod -> product_desc}}</td>
		</tr>
		@endforeach
	</table>
</div>
</div>

@endsection