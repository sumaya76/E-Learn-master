@extends('admin.master')
@section('content')
<form action="{{route('teacher.store')}}" method="post">
    @csrf

    <div class="form-group">
    <label for="">Teacher Name</label>
    <input type="text" class="form-control" id=""  placeholder="Enter Name" name="name">
    
   
  </div>
 

  <div class="form-group">
    <label for="">Upload logo: </label>
    <input type="file" class="form-control" placeholder="logo">
  </div>

  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" class="form-control" id="" name="teacher_description" cols="10" rows="5"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection








