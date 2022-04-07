@extends('admin.dashboard')

@section('maincontent')
{{-- session --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong>Colour Updated Successfully.
</div>
@endif
{{-- session --}}

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Colour Page</h3>
  </div>
  
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="{{ route('colour.index') }}" class="btn btn-outline-primary"><i class="fa fa-exit" aria-hidden="true"></i>Cancel</a>
   </div>
      <form action="{{ url('/colour/update',[$colour->id]) }}" method="post" enctype="multipart/form-data">
      
      {!! csrf_field() !!}
        <lable id="error" style="display: none;"></lable>
        <label>Colour Name</label></br>
        <input type="text" value="{{ $colour->name }}" name="name" id="colour_input_name" class="form-control">
        <span style="color: red">@error('name'){{$message}}@enderror</span></br>


        <input type="submit" value="upadte" class="btn btn-outline-primary">
    </form>

  </div>
</div>
@endsection
