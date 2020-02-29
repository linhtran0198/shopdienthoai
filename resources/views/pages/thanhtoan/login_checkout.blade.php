@extends('layout')
@section('content')
<section id="form" style="margin-top: 60px;"><!--form-->
		<!-- <div class="container"> -->
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="login-form"><!--login form-->
				<h2><b>Đăng Nhập </b></h2>
				<form action="{{URL::to('/login-customer')}}" method="POST">
					{{csrf_field()}}
					<input type="email" name="email_account" placeholder="Email " />
					<input type="password" name="password_account" placeholder="Mật Khẩu" />
					<span>
						<input type="checkbox" class="checkbox"> 
						Ghi Nhớ Đăng Nhập
					</span>
					<button type="submit" class="btn btn-default">Đăng Nhập</button>
				</form>
			</div><!--/login form-->
		</div>
		<div class="col-sm-1">
			<h2 class="or">Hoặc</h2>
		</div>
		<div class="col-sm-4">
			<div class="signup-form"><!--sign up form-->
				<h2><b>Đăng Kí </b></h2>
				<form action="{{URL::to('/add-customer')}}" method="POST">
					{{csrf_field()}}
					<input type="text" placeholder="Họ Tên" name="customer_name" />
					<input type="email" placeholder="Email " name="customer_email" />
					<input type="password" placeholder="Mật khẩu" name="customer_password">
					<input type="text" placeholder="SĐT" name="customer_phone" />
					<button type="submit" class="btn btn-default">Đăng Kí</button>
				</form>
			</div><!--/sign up form-->
		</div>
	</div>
		<!-- </div> -->
</section><!--/form-->
	
@endsection