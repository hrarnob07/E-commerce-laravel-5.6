@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Product</a>
				</li>
			</ul>
<div class="row-fluid sortable">
				<div class="box span12">

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Product</h2>
						<div class="box-icon">
							</div>
					</div>
					

					@if(session('response'))
					   <div class="alert alert-success">
					     {{session('response')}}
					   </div>
					 @endif

<div class="box-content">
<form class="form-horizontal" action="{{url('/save_product')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
<fieldset>
  <div class="control-group">
	<label class="control-label" for="focusedInput">Product Name</label>
	<div class="controls">
	  <input class="input-xlarge focused"  type="text" name="product_name">
	</div>
  </div>
 <div class="control-group">
 <label class="control-label" for="selectError3">Category Name</label>
		<div class="controls">
		 <select id="category_id"  class="form-control" name="category_id" value="{{ old('category_id') }}"  required>
			<option>Select Category</option>
			<?php
			$all_category =DB::table('tbl_categories')
                        ->where('publication_status',1)
                        ->get();
			 foreach ($all_category as $category ) {?>
<option value="{{$category->category_id}}">{{$category->category_name}}</option>
			
				<?php
			}?>
		  </select>
		</div>
 </div>

  <div class="control-group">
	<label class="control-label" for="selectError3">Manufacture Name</label>
	<div class="controls">
	  <select id="selectError3" name="manufacture_id">
   <?php 
      $all_manufacture=DB::table('tbl_manufacture_brands')
					->where('publication_status',1)
					->get();
		 foreach ($all_manufacture as $all_manu ) { ?>
<option value="{{$all_manu->manufacture_id}}">{{$all_manu->manufacture_name}}
		</option>
		<?php
	} 	?>
	  </select>
	</div>
  </div>

  <div class="control-group">
	<label class="control-label" for="disabledInput">Product Short Discription</label>
	<div class="controls">
	  <textarea class="cleditor" name="product_short_description"   rows="3">
	  </textarea>
	</div>
  </div>

  <div class="control-group">
	<label class="control-label" for="disabledInput">Product long Discription</label>
	<div class="controls">
	  <textarea class="cleditor" name="product_long_description"   rows="3">
	  </textarea>
	</div>
  </div>

<div class="control-group">
  <label class="control-label" for="focusedInput">Product Price</label>
  <div class="controls">
    <input class="input-xlarge focused" name="product_price" type="text" >
  </div>
</div>


  <div class="control-group">
<label class="control-label">Image</label>
<div class="controls">
  <input type="file" name="product_image">
</div>
</div>



<div class="control-group">
  <label class="control-label" for="focusedInput">Product Size</label>
  <div class="controls">
    <input class="input-xlarge focused" name="product_size" type="text" >
  </div>
</div>


 <div class="control-group">
  <label class="control-label" for="focusedInput">Product Color</label>
  <div class="controls">
    <input class="input-xlarge focused" name="product_color"type="text" >
  </div>
</div>



  <div class="control-group">
	<label class="control-label" for="optionsCheckbox2">Publication status</label>
	<div class="controls">
	  <label class="checkbox">
		<input type="checkbox"  value="1" name="publication_status">
	  </label>
	</div>
  </div>
 
  <div class="form-actions">
	<button type="submit" class="btn btn-primary">Add Product</button>
	<button type="reset" class="btn" value="Reset">Reset</button>
  </div>
</fieldset>
</form>
</div>
</div>
</div>
@endsection