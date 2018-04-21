@extends('./admin_layout')

@section('admin_content')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
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
				<form class="form-horizontal" action="{{route('update_category',$category->category_id)}}" method="post">
					{{ csrf_field() }}
				  <fieldset>
				  	
				  	
				  	
					<div class="control-group">
					  <label for="category_name" class="control-label" >Category Name </label>
					  <div class="controls">
						<input type="text" class="form-control" name="category_name" required="" value="{{$category->category_name}}">
						
					  </div>
					</div>
					          
					<div class="control-group hidden-phone">
					  <label class="control-label" for="category_description">Category Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="category_description" rows="3" required="">
							{{$category->category_description}}
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