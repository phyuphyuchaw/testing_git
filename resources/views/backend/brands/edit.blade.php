@extends('backendtemplate')

@section('content')
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          	<div class="row">
          	<div class="col">
            <h1 class="h3 mb-0 text-gray-800">Brand Edit Form</h1>
        </div>
    </div>
</div>

   	<form action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="" value="{{ $brand->name}}">
    </div>
  </div>

<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" class="form-upload-file"  value="">
    
  <img src="{{asset($brand->photo)}}" class="img-fluid w-25">
  <input type="hidden" name="oldphoto" value="{{$brand->photo}}">
</div>
 </div>

 <div class="form-group">
    
      <input type="submit" name="" value="Update" class="btn btn-success" id="">
    </div>

</div>
@endsection