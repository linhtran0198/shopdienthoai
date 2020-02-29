@extends('layout')
@section('content')
<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
		  <li class="active">Thanh Toán</li>
		</ol>
	</div>
	<div class="register-req">
		<p>Đăng Kí và Thanh toán để xem lịch sử đơn hàng.</p>
	</div><!--/register-req-->

	<div class="shopper-informations">
		<div class="row">
			<div class="col-sm-8">
				<div class="shopper-info">
					<p>	Thông tin người mua hàng</p>
					<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
						{{csrf_field()}}
						<input type="text" placeholder="Họ Tên" name="shipping_name">
						<input type="email" placeholder="Email" name="shipping_email">
						<input type="text" placeholder="Địa chỉ" name="shipping_address">
						<input type="text" placeholder="SĐT" name="shipping_phone">
						<input type="submit" value="Gửi Đơn Hàng" name="send_order" class="btn btn-primary btn-sm" style="width: 100px">
					</form>
				</div>
			</div>
			<div class="col-sm-4">
				
			</div>					
		</div>
	</div>
<!-- 			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div> -->
</section> <!--/#cart_items-->

	
@endsection