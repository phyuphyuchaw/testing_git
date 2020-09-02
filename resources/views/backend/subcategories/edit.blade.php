@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory Edit Form</h1>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<form action="{{ route('subcategories.update',$subcategory->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')


    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Subcategory Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="" name="subcategory" value="{{ $subcategory->name }}">
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-6">
          <select name="id" id="" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
            @if($category->id==$subcategory->category->id)
              selected
            @endif
            >{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
		</div>
	</div>
</div>
@endsection