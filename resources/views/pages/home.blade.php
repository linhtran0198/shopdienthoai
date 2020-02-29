@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center"> Sản Phẩm Mới Nhất</h2>
    @foreach($all_product as $key => $product)
        <div class="col-sm-3">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product-> product_id)}}">
                <div class="product-image-wrapper">
                    <div  class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product_images/'.$product->product_img)}}" alt="" />
                            <h5>{{$product->product_name}}</h5>
                            <p style="color: red; font-weight: bolder;">{{number_format($product->product_price).' '. 'đ'}}</p>
                        
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
 </div><!--features_items-->
@endsection