@extends('layout')
@section('content')
<section id="cart_items">
		<!-- <div class="container"> -->
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
		  <li class="active">Giỏ hàng</li>
		</ol>
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
		<!-- </div> -->
</section> <!--/#cart_items-->

<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền <span>{{Cart::total().' đ'}}</span></li>
							<li>Phí ship <span>0 đ</span></li>
							<li>Thành tiền <span>{{Cart::total().' đ'}}</span></li>
						</ul>
						 <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                   <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                
                                <?php
                            }else{
                                 ?>
                                  <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                                 <?php 
                             }
                                 ?>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection