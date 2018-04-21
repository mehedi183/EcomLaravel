@extends('./admin_layout')

@section('admin_content')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					
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
				<form class="form-horizontal" action="{{route('update_brand',$brand->manufacture_id)}}" method="post">
					{{ csrf_field() }}
				  <fieldset>
				  	
				  	
				  	
					<div class="control-group">
					  <label for="brand_name" class="control-label" >Brand Name </label>
					  <div class="controls">
						<input type="text" class="form-control" name="manufacture_name" required="" value="{{$brand->manufacture_name}}">
						
					  </div>
					</div>
					          
					<div class="control-group hidden-phone">
					  <label class="control-label" for="brand_description">Brand Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="manufacture_description" rows="3" required="">
							{{$brand->manufacture_description}}
						</textarea>
					  </div>
					</div>
					
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Update Category</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->
@endsection