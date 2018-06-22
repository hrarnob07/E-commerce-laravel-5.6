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
					<a href="#">Add Slider</a>
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
<form class="form-horizontal" action="{{url('/save_slider')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
<fieldset>

 <div class="control-group">
<label class="control-label">Slider Image</label>
<div class="controls">
  <input type="file" name="slider_image" required="">
</div>
</div>

  <div class="control-group">
	<label class="control-label" for="optionsCheckbox2">Publication status</label>
	<div class="controls">
	  <label class="checkbox">
		<input type="checkbox"  value="1" name="publication_status" required="">
	  </label>
	</div>
  </div>
 
  <div class="form-actions">
	<button type="submit" class="btn btn-primary">Add Slider</button>
	<button type="reset" class="btn" value="Reset">Reset</button>
  </div>
</fieldset>
</form>
</div>
</div>
</div>
@endsection