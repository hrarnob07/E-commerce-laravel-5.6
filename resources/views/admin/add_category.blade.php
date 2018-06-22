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
					<a href="#">Add Category</a>
				</li>
			</ul>
<div class="row-fluid sortable">
				<div class="box span12">

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							</div>
					</div>
					

					@if(session('response'))
					   <div class="alert alert-success">
					     {{session('response')}}
					   </div>
					 @endif

<div class="box-content">
<form class="form-horizontal" action="{{url('/save_category')}}" method="POST">
	{{csrf_field()}}
<fieldset>
  <div class="control-group">
	<label class="control-label" for="focusedInput">Category Name</label>
	<div class="controls">
	  <input class="input-xlarge focused"  type="text" name="category_name">
	</div>
  </div>

  <div class="control-group">
	<label class="control-label" for="disabledInput">Category Discription</label>
	<div class="controls">
	  <textarea class="input-xlarge disabled" name="category_description"  placeholder="Discription .." rows="3">
	  </textarea>
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
	<button type="submit" class="btn btn-primary">Add Category</button>
	<button type="reset" class="btn" value="Reset">Reset</button>
  </div>
</fieldset>
</form>
</div>
</div>
</div>
@endsection