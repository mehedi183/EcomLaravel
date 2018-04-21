@extends('./admin_layout')

@section('admin_content')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Products</h2>
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
				<form class="form-horizontal" action="{{route('store_slider')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
				  <fieldset>
				  	<div class="control-group">
					  <label class="control-label" for="product_image">Slider Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file" required>
					  </div>
					</div>

					
					<div vlass="control-group">
						<label for="publication_status" class="control-label">Publication Status </label>
						<div class="controls">
						<input type="checkbox" class="form-control" name="publication_status" required>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Slider</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->
@endsection