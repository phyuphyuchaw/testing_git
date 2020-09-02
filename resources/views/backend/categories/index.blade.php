@extends('backendtemplate')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
         
          	<div class="col">
            <h1 class="h3 mb-0 text-gray-800">Category List</h1>
            <div class="float-right align-items-right justify-content-between mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
</div>

<div class="container-row">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{asset($category->photo)}}" width=100 height=100></td>
                        <td>
                            <div class="btn-gorup">
                                <a href="#" class="btn btn-primary">Detail</a>
                                <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </div>
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