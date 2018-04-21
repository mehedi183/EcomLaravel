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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Brands</h2>
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
								  <th>Brand Id</th>
								  <th>Brand Name</th>
								  <th>Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						@foreach($brands as $brand)
						  <tbody>
						  	{{csrf_field()}}
							<tr>
								<td>{{$brand->manufacture_id}}</td>
								<td>{{$brand->manufacture_name}}</td>
								<td class="center">{{$brand->manufacture_description}}</td>
								
								<td class="center">
									@if($brand->publication_status == 1)
										<span class="label label-success">Active</span>

									@else
										<span class="label label-danger">Not Active</span>
									@endif
								</td>
								<td class="center">
									@if($brand->publication_status == 1)
										<a class="btn btn-danger" href="{{route('change_brand_publication_status',$brand->manufacture_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{route('change_brand_publication_status',$brand->manufacture_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" href="{{route('edit_brand', $brand->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{route('delete_brand',$brand->manufacture_id)}}">
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