@extends('layout')
@section('content')
<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
		  <li class="active">Thanh toán giỏ hàng</li>
		</ol>
		<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
		</div>
	</div>
	<div class="table-responsive cart_info">
		<?php
			$content = Cart::content();
		?>
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Hình ảnh</td>
					<td class="description">Tên sản phẩm</td>
					<td class="price">Giá</td>
					<td class="quantity">Số lượng</td>
					<td class="total">Tổng</td>
					<td></td>
				</tr>
			</thead>

			@foreach($content as $v_content)
			<tbody>
				<tr>
					<td class="cart_product">
						<a href=""><img src="{{URL::to('public/uploads/product_images/'.$v_content->options->image)}}" alt="" width="70"></a>
					</td>
					<td class="cart_description">
						<h4><a href="">{{$v_content->name}}</a></h4>
					</td>
					<td class="cart_price">
						<p>{{number_format($v_content->price)}} đ</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<form action="{{URL::to('/update-cart/')}}" method="POST">
								{{csrf_field()}}
								<input class="cart_quantity_input " type="text" name="quantity_cart" value="{{$v_content->qty}}" style="width: 40px">
								<input  type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" class="form-control">
								<button type='submit' name="update_qty" class="btn btn-default btn-sm">Sửa</button>
							</form>
							
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price">
							<?php
								$subtotal = $v_content->price*$v_content->qty;
								echo number_format($subtotal).' '.' đ';
							?>
						</p>
					</td>
					<td class="cart_delete">
						<a onclick="return confirm('Bạn có chắc muốn xóa giỏ hàng này?')" class="cart_quantity_delete" href="{{URL::to('/xoa-gio-hang/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			</tbody>
				@endforeach
		</table>
	</div>
	<h3 style="margin: 30px 0px ">Chọn hình thức thanh toán:</h3>
	<form action="{{URL::to('/order-place')}}" method="POST">
		{{csrf_field()}}
		<div class="payment-options">
				<span>
					<label><input name="payment_options" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
				</span>
				<span>
					<label><input name="payment_options" value="2" type="checkbox"> Trả tền mặt</label>

				</span>
				<input type="submit" value="Đặt Hàng" name="send_order_place" class="btn btn-primary btn-sm" style="width: 100px"> 

		</div>
	</form>
</section> <!--/#cart_items-->

	
@endsection