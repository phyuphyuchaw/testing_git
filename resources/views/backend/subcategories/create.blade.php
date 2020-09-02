@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory Create Form</h1>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<form action="{{ route('subcategories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">SubCategory Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="" name="subcategory">
        @error('subcategory')
          <label class="text-danger">please enter Subcategory name</label>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Category Name</label>
    
        <div class="col-sm-6">
          <select name="id" id="" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
    </div>
   
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </form>
		</div>
	</div>
</div>
@endsection