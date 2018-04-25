@extends('layout')
@section('content')
<section id="cart_items">
	
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="register-req">
			<p>Please fill up the form</p>
		</div><!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				
				<div class="col-sm-12 clearfix">
					<div class="bill-to">
						<p>Shipping Details</p>
						<div class="form-one">
							<form action="{{route('save_shipping_details')}}" method="post">
								{{csrf_field()}}
								<input type="text" name="shipping_fname" placeholder="First Name *" required>
								<input type="text" name="shipping_lname" placeholder="Last Name *" required>
								<input type="text" name="shipping_email" placeholder="Email*" required>
								<input type="text" name="shipping_mobile_number" placeholder="Mobile Number *" required>
								<input type="text" name="shipping_address" placeholder="Address *" required>
								<input type="text" name="shipping_city" placeholder="City" required>
								<div class="col-sm-offset-4 col-sm-6">
									<input type="submit" class="btn btn-warning" value="Confirm Shepping Details">
								</div>
								
							</form>
						</div>
						
					</div>
				</div>
									
			</div>
		</div>	
</section> <!--/#cart_items-->

@endsection