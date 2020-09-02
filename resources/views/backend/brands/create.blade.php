@extends('backendtemplate')

@section('content')
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          	<div class="row">
          	<div class="col">
            <h1 class="h3 mb-0 text-gray-800">Brand Create Form</h1>
            

        </div>
    </div>
</div>

<form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="">
      @error('name')
      <label class="text-danger">Please input Name !</label>
      @enderror
    </div>
  </div>

<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" class="form-upload-file" id="">
      @error('photo')
      <label class="text-danger">Please input choose Photo!</label>
      @enderror
    </div>
</div>
    <div class="form-group">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Create</button>
    </div>    
    </div>
</form>
@endsection