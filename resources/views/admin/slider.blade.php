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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
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
								  <th>slider Id</th>
								  <th>slider Image</th>
								  <th>Status</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						@foreach($sliders as $slider)
						  <tbody>
						  	{{csrf_field()}}
							<tr>
								<td>{{$slider->slider_id}}</td>
								<td><img src="{{$slider->slider_image}}" alt="" style="height: 80px; width: 200px;"></td>														
								<td class="center">
									@if($slider->publication_status == 1)
										<span class="label label-success">Active</span>

									@else
										<span class="label label-danger">Not Active</span>
									@endif
								</td>
								<td class="center">
									@if($slider->publication_status == 1)
										<a class="btn btn-danger" href="{{route('change_slider_publication_status',$slider->slider_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{route('change_slider_publication_status',$slider->slider_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									
									<a class="btn btn-danger" id="delete" href="{{route('delete_slider',$slider->slider_id)}}">
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