@extends('./admin_layout')

@section('admin_content')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
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
				<form class="form-horizontal" action="{{route('store_brand')}}" method="post">
					{{ csrf_field() }}
				  <fieldset>
				  	
				  	
				  	
					<div class="control-group">
					  <label for="manufacture_name" class="control-label" >Brand Name </label>
					  <div class="controls">
						<input type="text" class="form-control" name="manufacture_name" required="">
						
					  </div>
					</div>
					          
					<div class="control-group hidden-phone">
					  <label class="control-label" for="manufacture_description">Brand Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="manufacture_description" rows="3" required=""></textarea>
					  </div>
					</div>
					<div vlass="control-group">
						<label for="publication_status" class="control-label">Publication Status </label>
						<div class="controls">
						<input type="checkbox" class="form-control" name="publication_status" >
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Brand</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->
@endsection