@extends('admin.master')
@section('content')
<form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
    @csrf

<div class="form-group">
    <label for="">Book Name</label>
    <input type="text" class="form-control" id=""  placeholder="Enter Name" name="book_name">
   @error('book_name')
   <div class="alert alert-danger">{{$message}}</div>
   @enderror

  </div>
  <div class="form-group">
    <label for="">Logo</label>
    <input type="file" class="form-control" id=""  placeholder="Enter logo" name="logo">
   
  </div>
  
 
  
  <div class="form-group">
    <label for="">Author Name</label>
    <input type="text" class="form-control" id=""  placeholder="Enter Name" name="author_name">
   
  </div>
  <div class="form-group">
    <label for="">Price</label>
    <input type="text" class="form-control" id=""  placeholder="Enter price" name="book_price">
   

  </div>
  
  <div class="form-group">
    <label for="">Book Description</label>
    <textarea class="form-control" class="form-control" id="" input name="book_description" cols="10" rows="5"></textarea>
</div>
  
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection