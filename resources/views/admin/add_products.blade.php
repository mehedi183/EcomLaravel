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
				<form class="form-horizontal" action="{{route('store_products')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
				  <fieldset>
				  	
				  	
				  	
					<div class="control-group">
					  <label for="product_name" class="control-label" >Product Name </label>
					  <div class="controls">
						<input type="text" class="form-control" name="product_name" required="">
						
					  </div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Select Category</label>
						<div class="controls">
						  	<select data-rel="chosen" name="category_id">
						  		@foreach($categories as $category)
						  		@if($category->publication_status == 1)
								<option value="{{$category->category_id}}">{{ $category->category_name }}
								</option>
								@endif
								@endforeach
						  	</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Select Brand</label>
						<div class="controls">
						  	<select data-rel="chosen" name="manufacture_id">
						  		@foreach($brands as $brand)
						  		@if($brand->publication_status == 1)
								<option value="{{$brand->manufacture_id}}">{{ $brand->manufacture_name }}</option>
								@endif
								@endforeach
						  	</select>
						</div>
					</div>	
					<div class="control-group hidden-phone">
					  <label class="control-label" for="product_short_description">Short Description</label>
					  <div class="controls">
						<input class="cleditor" name="product_short_description" rows="2" required=""></input>
					  </div>
					</div>         
					<div class="control-group hidden-phone">
					  <label class="control-label" for="product_long_description">Full Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="product_long_description" rows="3" required=""></textarea>
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="product_image">Upload Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
					  </div>
					</div>

					<div class="control-group">
					  <label for="product_price" class="control-label" >Product Price </label>
					  <div class="controls">
						<input type="text" class="form-control" name="product_price" required="">
						
					  </div>
					</div>
					<div class="control-group">
					  <label for="product_size" class="control-label" >Product Size</label>
					  <div class="controls">
						<input type="text" class="form-control" name="product_size" required="">
						
					  </div>
					</div>

					<div class="control-group">
					  <label for="product_color" class="control-label" >Product Color</label>
					  <div class="controls">
						<input type="text" class="form-control" name="product_color" required="">
						
					  </div>
					</div>
					<div vlass="control-group">
						<label for="publication_status" class="control-label">Publication Status </label>
						<div class="controls">
						<input type="checkbox" class="form-control" name="publication_status" >
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Product</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->
@endsection