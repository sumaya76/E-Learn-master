@extends('admin.master')
@section('content')
<form action="{{route('student.store')}}" method="post">
    @csrf

<div class="form-group">
    <label for="">Student Name</label>
    <input type="text" class="form-control" id=""  placeholder="Enter Name" name="student_name">
    
    @error('student_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 
   

   

  <div class="form-group">
    <label for="">Upload Image: </label>
    <input type="file" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Email</label>
    <input type="string"  class="form-control" id="" name="student_email" cols="10" rows="5">
    @error('student_email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection








