@extends('backendtemplate')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<div class="col">
			<h1 class="h3 mx-1 mb-0 text-gray-800">Subcategories List</h1>
			<div class="float-right align-items-right justify-content-between mb-4">
			<a href="{{route('subcategories.create')}}" class="btn btn-primary">Add New</a>	
</div>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>CategoryName</th>
					<th>SubcategoryName</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php  $i=1; @endphp
				@foreach($subcategories as $subcategory)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$subcategory->category->name}}</td>
					<td>{{$subcategory->name}}</td>
					
					<td>
						<a href="" class="btn btn-info">Detail</a>
						<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
						<a href="" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection