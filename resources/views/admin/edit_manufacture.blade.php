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
<form class="form-horizontal" action="{{URL::to('/update_manufacture/'.$data->manufacture_id)}}" method="POST">
	{{csrf_field()}}
<fieldset>
  <div class="control-group">
	<label class="control-label" for="focusedInput">Manufacture Name</label>
	<div class="controls">
	  <input class="input-xlarge focused"  type="text" name="manufacture_name" value="{{$data->manufacture_name}}">
	</div>
  </div>

  <div class="control-group">
	<label class="control-label" >Manufacture Discription</label>
	<div class="controls">
	  <textarea  name="manufacture_description" rows="4">
	  	{{$data->manufacture_description}}
	  </textarea>
	</div>
  </div>
 
 
  <div class="form-actions">
	<button type="submit" class="btn btn-primary">Update Manufacture</button>
	
</fieldset>
</form>
</div>
</div>
</div>
@endsection