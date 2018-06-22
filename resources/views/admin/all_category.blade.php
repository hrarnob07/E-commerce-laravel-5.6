@extends('admin_layout')
@section('admin_content')
<div id="content" class="span10">


<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		@if(session('response'))
					   <div class="alert alert-success">
					     {{session('response')}}
					   </div>
					 @endif
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
				  	  <th>Category ID</th>
					  <th>Category Name</th>
					  <th>Category Description</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			    @foreach($datas as $data )
			  <tbody>
				
				<tr>
					<td>{{$data->category_id}}</td>
					<td class="center">{{$data->category_name}}</td>
					<td class="center">{{$data->category_description}}</td>
					<td class="center">
						@if($data->publication_status==1)
						<span class="label label-success">Active</span>
						 @else
						 <span class="label label-denger">InActive</span>
						 @endif

					</td>
					<td class="center">
						@if($data->publication_status==0)
						<a class="btn btn-success" href="{{URL::to('/active_category/'.$data->category_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@else($data->publication_status==1)
						<a class="btn btn-danger" href="{{URL::to('/inactive_category/'.$data->category_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@endif
						<a class="btn btn-info" href="{{URL::to('/edit_category/'.$data->category_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete_category/'.$data->category_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				
				
				
			  </tbody>
			  @endforeach
		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection