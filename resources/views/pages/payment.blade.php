@extends('layout')

@section('content')
	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php 
					$contents = Cart::content();

				 ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="name">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($content->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								<p>Web ID: {{$content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{$content->price}} Tk</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{route('update_cart')}}" method="post">
										{{csrf_field()}}
									<p align="center">{{$content->qty}}</p>
									<input type="hidden" name="rowId" value="{{$content->rowId}}">
									{{-- <input type="submit" class="btn btn-sm btn-default" value="update" /> --}}
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$content->total}}</p>
							</td>
							{{-- <td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('remove_item_from_cart',$content->rowId)}}"><i class="fa fa-times"></i></a>
							</td> --}}
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<h3> Chose Payment Methods</h3><hr/>
	<form action="{{route('place_order')}}" method="post" accept-charset="utf-8">
		{{csrf_field()}}
		<input type="radio" name="payment_getway" value="bkash" required><strong> B-Kash  </strong><img src="{{asset('frontend/images/getway/bkash.png')}}" alt="" height="80px" width="80px"><br/>

		<input type="radio" name="payment_getway" value="cash_on_delivry"  required><strong> Cash On Delivry  </strong><img src="{{asset('frontend/images/getway/cash.jpg')}}" alt="" height="80px" width="80px"><br/>

		<input type="radio" name="payment_getway" value="card"  required><strong> Master Card  </strong><img src="{{asset('frontend/images/getway/card.png')}}" alt="" height="80px" width="80px"><br>

		<input type="submit" name="submit" value="Place Order" class="btn btn-lg btn-success">


	</form>

@endsection