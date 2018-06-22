@extends('admin_layout')
@section('admin_content')
<div id="content" class="span10">




<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Order Management</h2>
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
				  	  <th>Order ID</th>
					  <th>Customer Name</th>
					  <th>Order Total</th>
					  <th>order Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			    @foreach($datas as $data )
			  <tbody>
				
				<tr>
					<td class="center">{{$data->order_id}}</td>
					<td class="center">{{$data->customer_name}}</td>
					<td class="center">{{$data->order_total}}</td>
					<td class="center">{{$data->order_status}}</td>
					

		<td class="center">
			
			<a class="btn btn-success" href="{{URL::to('/active_order/'.$data->order_id)}}">
				<i class="halflings-icon white thumbs-up"></i>  
			</a>
			
			
		
			<a class="btn btn-info" href="{{URL::to('/view_order/'.$data->order_id)}}">
				<i class="halflings-icon white edit"></i>  
			</a>
			<a class="btn btn-danger" href="{{URL::to('/delete_order/'.$data->order_id)}}" id="delete">
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