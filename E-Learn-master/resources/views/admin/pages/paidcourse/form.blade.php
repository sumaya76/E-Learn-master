@extends('admin.master')
@section('content')


<form action="{{route('paid.store')}}" method="post" enctype="multipart/form-data">
    @csrf





<div class="form-group">
    <label for="">Paidcourse Name</label>
    <input required type="text"    name="paidcourse_name"    class="form-control" id=""  placeholder="Enter Name" input="paidcourse_name">
    @error('paidcourse_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  
  
  
  <div class="form-group">
    <label for="">Description</label>
    <textarea name="paidcourse_description"  class="form-control" id="" input="description" cols="10" rows="5"></textarea>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="">Enter Fees: </label>
    <input required type="number" class="form-control" placeholder="Enter price" name="paidcourse_price">

    
    @error('paidcourse_price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>

  <div class="form-group">
    <label for="">Upload Image: </label>
    <input type="file" class="form-control" name="image">
  </div>
  <div>
        <label for="paidcourse_link">Course Link:</label>
        <input type="string" id="link"  placeholder="Enter link" name="paidcourse_link" required>
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection