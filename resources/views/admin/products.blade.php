@extends('./admin_layout')

@section('admin_content')
	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			
			<div class="row-fluid sortable">

				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<?php 
						$message = Session::get('message');
						if ($message) {
							
							echo "<p class='alert alert-success'>".$message."</p>";
							Session::put('message',null);
						}

					?>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Description</th>
								  <th>Image</th>
								  <th>Price</th>
								  <th>Category</th>
								  <th>Brand</th>
								  <th>Status</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						@foreach($products as $product)
						  <tbody>
						  	{{csrf_field()}}
							<tr>
								<td>{{$product->product_id}}</td>
								<td>{{$product->product_name}}</td>
								<td class="center">{{$product->product_short_description}}</td>
								<td><img src="{{$product->product_image}}" alt="" style="height: 50px; width: 50px;"></td>
								<td>{{$product->product_price}} Tk</td>
								
								<td>{{$product->category_name}}</td>
								<td>{{$product->manufacture_name}}</td>

								
								<td class="center">
									@if($product->publication_status == 1)
										<span class="label label-success">Active</span>

									@else
										<span class="label label-danger">Not Active</span>
									@endif
								</td>
								<td class="center">
									@if($product->publication_status == 1)
										<a class="btn btn-danger" href="{{route('change_product_publication_status',$product->product_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{route('change_product_publication_status',$product->product_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" href="{{route('edit_product', $product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{route('delete_product',$product->product_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  </tbody>
						@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    

@endsection
@section('script')
<script>
	$(document).ready(function(){
		$(document).on('click','#delete',function(event){
						event.preventDefault();
						var link = $(this).attr("href");
						bootbox.confirm({ 
						  size: "small",
						  message: "Are you sure?", 
						  callback: function(result){ 
							if (result) {
							window.location.href = link;
							}
						}
					});
				});
	});
		
</script>
@endsection