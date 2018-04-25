@extends('./layout');
@section('content')
	<div class="features_items"><!--features_items-->
	    <h2 class="title text-center">Features Items</h2>
	    
	    @foreach($products_by_brand as $product_by_brand)
	    <div class="col-sm-4">
	        <div class="product-image-wrapper">
	            <div class="single-products">
	                    <div class="productinfo text-center">
	                        <img src="{{URL::to($product_by_brand->product_image)}}" style="width: 280px; height: 220px;" alt="" />
	                        <h2>{{$product_by_brand->product_price}} Tk</h2>
	                        <p>{{$product_by_brand->product_short_description}}</p>
	                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                    </div>
	                    <div class="product-overlay">
	                        <div class="overlay-content">
	                            <h2>{{$product_by_brand->product_price}} Tk</h2>
	                            <a href="{{route('view_product',$product->product_id)}}" title=""><p>{{$product->product_name}}</p></a>
	                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                        </div>
	                    </div>
	            </div>
	            <div class="choose">
	                <ul class="nav nav-pills nav-justified">
	                    <li><a href="#"><i class="fa fa-plus-square"></i>{{$product_by_brand->manufacture_name}}</a></li>
	                    <li><a href="{{route('view_product',$product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    @endforeach
	    
	</div><!--features_items-->
	
@endsection