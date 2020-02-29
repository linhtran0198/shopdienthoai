<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>LinhTran Mobile</title>
<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">      
<link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
<div class="header_top"><!--header_top-->
  <div class="container">
    <div class="row">
    <div class="col-sm-6">
        <div class="contactinfo">
            <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone" ></i> 0984709086</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> linhtv0124@gmail.com</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
    </div>
  </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
<div class="container">
<div class="row">
  <div class="col-sm-4">
      <div class="logo pull-left">
          <img src="{{('public/frontend/images/logo2.png')}}" alt="" style="width: 200px; height: 100px" />
      </div>
  </div>
  <div class="col-sm-8" style="padding-top: 30px;">
      <div class="shop-menu pull-right">
          <ul class="nav navbar-nav" >
              <?php
                    $customer_id = Session::get('customer_id');
                    $shipping_id = Session::get('shipping_id');
                    if($customer_id!=NULL && $shipping_id==NULL){ 
              ?>
                   <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs" ></i> Thanh toán</a></li>
                 
              <?php
                  }elseif($customer_id!=NULL && $shipping_id!=NULL){
              ?>
                  <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
              <?php 
                 }else{
              ?>
                  <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
              <?php
                  }
              ?>
              <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
             <?php
                 $customer_id = Session::get('customer_id');
                 if($customer_id!=NULL){ 
               ?>
                <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
              <?php
          }else{
               ?>
               <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
               <?php 
           }
               ?>
          </ul>
      </div>
  </div>
</div>
</div>
</div><!--/header-middle-->

<div class="header-bottom"><!--header-bottom-->
<div class="container">
<div class="row">
  <div class="col-sm-8">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
      </div>
      <div class="mainmenu pull-left">
          <ul class="nav navbar-nav collapse navbar-collapse" >
              <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li> 
              <li><a href="{{URL::to('/show-cart')}}">Giỏ Hàng</a></li>
          </ul>
      </div>
  </div>
  <div class="col-sm-4">
    <form action="{{URL::to('/tim-kiem-san-pham')}}" method="POST">
      {{csrf_field()}}
      <div class="search_box pull-right">
          <input type="text" name="keyword_search" placeholder="Tìm kiếm sản phẩm"/ style="width: 200px; font-family: 'Roboto';">
          <input type="submit" name="keyword_submit" value="Tìm kiếm" class="btn btn-primary btn-sm" style="margin-top: 0px; color: black; width: 70px">
      </div>
    </form>
  </div>
</div>
</div>
</div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators" style="bottom: -35px;">
                  <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#slider-carousel" data-slide-to="1"></li>
                  <li data-target="#slider-carousel" data-slide-to="2"></li>
              </ol>
              
              <div class="carousel-inner">
                  <div class="item active">
                      <div class="col-sm-6">
                          <h1><span>Iphone11 </span></h1>
                          <h2>iPhone 11 Pro Max Chính hãng(VN/A)</h2>
                          <p>Giảm ngay 500.000đ khi trả góp 0% qua Home Credit </p>
                      </div>
                      <div class="col-sm-6">
                          <img src="public/frontend/images/iphone11.jpg" class="girl img-responsive" alt="" width="250px" height="350px" />
                          <img src="images/home/pricing.png"  class="pricing" alt="" />
                      </div>
                  </div>
                  <div class="item">
                      <div class="col-sm-6">
                          <h1><span>Apple iPhone XS</span></h1>
                          <h2>iPhone XS 64GB Chính hãng(VN/A)</h2>
                          <p>20.290.000 ₫ Giá niêm yết : 23.000.000 ₫. </p>
                      </div>
                      <div class="col-sm-6">
                         <img src="public/frontend/images/iphone11.jpg" class="girl img-responsive" alt="" width="250px" height="350px" />
                          <img src="images/home/pricing.png"  class="pricing" alt="" />
                      </div>
                  </div>
                  
                  <div class="item">
                      <div class="col-sm-6">
                          <h1><span>Samsung Galaxy Note 10+</span></h1>
                          <h2>25.000.000 ₫</h2>
                          <p>Samsung Galaxy Note 10 Plus – Màn hình lớn cho trải nghiệm tuyệt đỉnh, S-Pen tiện dụng </p>
                      </div>
                      <div class="col-sm-6">
                          <img src="{{('public/frontend/images/ss1.jpg')}}" class="girl img-responsive" alt="" width="250px" height="350px" />
                          <img src="images/home/pricing.png" class="pricing" alt="" />
                      </div>
                  </div>
                  
              </div>
              
              <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
              </a>
              <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                  <i class="fa fa-angle-right"></i>
              </a>
          </div>  
        </div>
        </div>
    </div>
</section><!--/slider-->

<section>
<div class="container">
<div class="row">
<div class="col-sm-3">
  <div class="left-sidebar">
      <h2>Danh mục sản phẩm</h2>
      <div class="panel-group category-products" id="accordian"><!--category-productsr-->
          <div class="panel panel-default">
              @foreach($category as $key =>$cate)
              <div class="panel-heading" style="text-align: center;">
                  <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
              </div>
              @endforeach
          </div>
      </div><!--/category-products-->
  </div>
</div>

<div class="col-sm-9 padding-right">

@yield('content')
</div>

</div>
</div>
</section>

<footer id="footer"><!--Footer-->
<div class="footer-top">

<div class="footer-widget">
<div class="container">
<div class="row">
  <div class="col-sm-3">
      <div class="single-widget">
          <h2>Dịch Vụ</h2>
          <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Mua hàng thanh toán Online</a></li>
              <li><a href="#">Mua hàng trả góp Online</a></li>
              <li><a href="#">Tra thông tin đơn hàng</a></li>
              <li><a href="#">Huỷ giao dịch và đổi trả</a></li>
              <li><a href="#">FAQ’s</a></li>
          </ul>
      </div>
  </div>

  <div class="col-sm-2">
      <div class="single-widget">
          <h2>Chính Sách</h2>
          <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Chính sách Bảo hành</a></li>
              <li><a href="#">Chính sách sử dụng</a></li>
              <li><a href="#">Chính sách bảo mật</a></li>
          </ul>
      </div>
  </div>
  <div class="col-sm-2">
      <div class="single-widget">
          <h2>Về chúng tôi</h2>
          <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Thông tin cửa hàng</a></li>
              <li><a href="#">Tuyển dụng</a></li>
              <li><a href="#">Hệ thống cửa hàng</a></li>
          </ul>
      </div>
  </div>
  <div class="col-sm-4 col-sm-offset-1">
      <div class="single-widget">
          <h2>Liên hệ chúng tôi</h2>
          <form action="#" class="searchform">
              <input type="text" placeholder="Email" />
              <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
          </form>
           <ul class="nav nav-pills nav-stacked">
              <li><a href="#"><b>Địa chỉ:</b> Số 298 đường Cầu Diễn, quận Bắc Từ Liêm, Hà Nội</a></li>
              <li><a href="#"><b>SĐT:</b> 0984709086</a></li>
              <li><a href="#"><b>Email:</b> linhtv0124@gmail.com</a></li>
          </ul>
      </div>
  </div>
  
</div>
</div>
</div>

<div class="footer-bottom">
<div class="container">
<div class="row">
  <p class="pull-left">Copyright © Linh Tran. All rights reserved.</p>
</div>
</div>
</div>

</footer><!--/Footer-->



<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>