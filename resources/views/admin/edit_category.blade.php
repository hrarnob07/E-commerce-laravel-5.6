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
					<a href="#">Update Category</a>
				</li>
			</ul>
<div class="row-fluid sortable">
				<div class="box span12">

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category Form</h2>
						<div class="box-icon">
							</div>
					</div>
					

					@if(session('response'))
					   <div class="alert alert-success">
					     {{session('response')}}
					   </div>
					 @endif

<div class="box-content">
<form class="form-horizontal" action="{{URL::to('/update_category/'.$data->category_id)}}" method="POST">
	{{csrf_field()}}
<fieldset>
  <div class="control-group">
	<label class="control-label" for="focusedInput">Category Name</label>
	<div class="controls">
	  <input class="input-xlarge focused"  type="text" name="category_name" value="{{$data->category_name}}">
	</div>
  </div>

  <div class="control-group">
	<label class="control-label" >Category Discription</label>
	<div class="controls">
	  <textarea class="input-xlarge disabled" name="category_description" rows="5">
	  	{{$data->category_description}}
	  </textarea>
	</div>
  </div>
 
 
  <div class="form-actions">
	<button type="submit" class="btn btn-primary">Update Category</button>
	
</fieldset>
</form>
</div>
</div>
</div>
@endsection