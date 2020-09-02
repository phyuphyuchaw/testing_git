@extends('backendtemplate')
@section('content')
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="row">
            <div class="col">
            <h1 class="h3 mb-0 text-gray-800">Category Edit Form</h1>
            

        </div>
    </div>
</div>

<form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <input type="hidden" name="oldphoto" id="" value="{{ $category->photo }}">

    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="" name="category" value="{{ $category->name }}">
      </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-6">
          <input type="file" class="form-control-file" id="" name="photo"><br>
          <img src="{{ asset($category->photo) }}" alt="" width="100" height="100">
        </div>
      </div>

      
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
</div>
@endsection