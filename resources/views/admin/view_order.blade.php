@extends('admin_layout')
@section('admin_content')
<div id="content" class="span10">

<div class="row-fluid sortable">		
	<div class="box span12 ">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>customer details</h2>
		</div>
		
<div class="box-content">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
	  <thead>
		  <tr>
			  <th>Customer Name</th>
			  <th>Customer Mobie</th>
			 
		  </tr>
	  </thead>   

	  <tbody>
		
		<tr>		
		<td class="center">{{$datas->customer_name}}</td>
		<td class="center">{{$datas->mobile_number}}</td>
	    </tr>		
	  </tbody>

  </table>            
</div>


		
</div>
</div>



<div class="row-fluid sortable">		
	<div class="box span12 ">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>shipping details</h2>
		</div>
		
<div class="box-content ">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
	  <thead>
		  <tr>
			  <th>Shipping Name</th>
			  <th>Shipping Address</th>
			  <th>Shipping Mobie</th>
			 
		  </tr>
	  </thead>   
	  <tbody>
		
		<tr>		
		<td class="center">{{$datas->shipping_first_name}}</td>
		<td class="center">{{$datas->shipping_address}}</td>
		<td class="center">{{$datas->shipping_mobile_no}}</td>
	    </tr>		
	  </tbody>

  </table>            
</div>

<div class="row-fluid sortable">		
	<div class="box span12 ">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Product details</h2>
		</div>
		
<div class="box-content col-mid-6">
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
	  <thead>
		  <tr>
		  	  <th>ID</th>
			  <th>Product Name</th>
			  <th>Product price</th>
			  <th>Product Quentity</th>
			  
			 
		  </tr>
	  </thead>   
<tbody>
 
  <tr>		
	<td class="center">{{$datas->product_id}}</td>
	<td class="center">{{$datas->product_name}}</td>
	<td class="center">{{$datas->product_price}}</td>
	<td class="center">{{$datas->product_sell_quantity}}</td>
	
 </tr>

</tbody>

  </table>            
</div>




		
</div>
</div>


		
</div>
</div>
<h2>Total price</h2>
<table border="1">
	<th>Total price</th>
	<tr><td>{{$datas->order_total}}</td></td><tr>
	
</table>


</div><!--/row-->
@endsection

<!-- @foreach($datas as $dat )
 <tr>		
	
	<td class="center">{{$dat->product_id}}</td>
	<td class="center">{{$dat->product_name}}</td>
	<td class="center">{{$dat->product_price}}</td>
	<td class="center">{{$dat->product_sell_quantity}}</td>
	
 </tr>
  @endforeach
  -->