@extends('admin.master')
@section('content')





<form action="{{route('unpaid.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="">Unpaidcourse Name</label>
    <input type="text" name="unpaidcourse_name"class="form-control" id=""  placeholder="Enter Name" input="unpaidcourse_name">
   
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="unpaidcourse_description"class="form-control" id="" input="unpaidcourse_description" cols="10" rows="5"></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection