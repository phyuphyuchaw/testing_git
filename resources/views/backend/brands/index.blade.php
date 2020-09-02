@extends('backendtemplate')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
         
          	<div class="col">
            <h1 class="h3 mb-0 text-gray-800">Brands List</h1>
            <div class="float-right align-items-right justify-content-between mb-4">
            <a href="{{route('brands.create')}}" class="btn btn-success">Add New</a>
            </div>
        </div>
    </div>
    <div class="container-row">
	<div class="row">
		<div class="col-md-12">
	<table class="table table-bordered">
		<thead class="thead-dark">
			
			<tr>
				<th>NO</th>
				<th>Name</th>
				<th>Photo</th>
				<th>Action</th>
						
			</tr>
			
		</thead>
		<tbody>
			@php $i=1;
			@endphp
			@foreach($brands as $brand)
			<tr>
			<td>{{$i++}}</td>
			<td>{{$brand->name}}</td>
			<td><img src="{{asset($brand->photo)}}" width=100 height=100></td>
			<td>
				<a href="#" class="btn btn-primary">Detail</a>
				<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning">Edit</a>
				<a href="#" class="btn btn-danger">Delete</a>



				
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection