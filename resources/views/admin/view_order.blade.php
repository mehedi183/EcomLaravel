@extends('./admin_layout')
@section('admin_content')
<div class="row-fluid sortable">
	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
			{{-- <div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div> --}}
		</div>
		<div class="box-content">
			<table class="table">
				  <thead>
					  <tr>
						  <th>Customer Id</th>
						  <th>Customer Name</th>
						  <th>Mobile Number</th>                                          
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>{{$customer_info->customer_id}}</td>
						<td class="center">{{$customer_info->customer_name}}</td>
						<td class="center">{{$customer_info->mobile_number}}</td>                                       
					</tr>                                   
				  </tbody>
			 </table>     
		</div>
	</div><!--/span-->
	
	<div class="box span6">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
			{{-- <div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div> --}}
		</div>
		<div class="box-content">
			<table class="table table-striped">
				  <thead>
					  <tr>
						  <th>To</th>
						  <th>Address</th>
						  <th>Mobile Number</th>                                          
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>{{$shipping_info->shipping_fname}} {{$shipping_info->shipping_lname}}</td>
						<td class="center">{{$shipping_info->shipping_address}}</td>
						<td class="center">{{$shipping_info->shipping_mobile_number}}</td>                                      
					</tr>                                  
				  </tbody>
			 </table>      
		</div>

	</div>
	
	<div class="box span12">
		<div class="box-header">
			<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Combined All Table</h2>
			{{-- <div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div> --}}
		</div>
		<div class="box-content">
			<table class="table table-bordered table-striped table-condensed">
				  <thead>
					  <tr>
						  <th>ID</th>
						  <th>Product Name</th>
						  <th>Product Price</th>
						  <th>Quantity</th>                                          
						  <th>Sub-Total</th>                                          
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach($orders as $order)
					<tr>
						<td>{{$order->order_id}}</td>
						<td class="center">{{$order->product_name}}</td>
						<td class="center">{{$order->product_price}}</td>
						<td class="center">{{$order->product_quantity}}</td>
						<td class="center">{{$order->product_price}}</td>
						                                       
					</tr> 
					@endforeach 
				  </tbody>
					<table><tr><td><strong>Total : </strong></td><td><strong>{{$shipping_info->order_total}} Tk/-</strong></td></tr> </table>                                
				  
			 </table>
			 
			   
		</div>
	</div><!--/span-->
</div><!--/row-->

@endsection