@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
   @foreach($category_name as $key => $name)
        <h2 class="title text-center">{{$name->category_name}}</h2>
    @endforeach

    @foreach($category_by_id as $key => $product)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product-> product_id)}}">
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to('public/uploads/product_images/'.$product->product_img)}}" alt="" />
                    <h5>{{$product->product_name}}</h5>
                    <p style="color: red; font-weight: bolder;">{{number_format($product->product_price).' '. 'đ'}}</p>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
</div><!--features_items-->
    
@endsection