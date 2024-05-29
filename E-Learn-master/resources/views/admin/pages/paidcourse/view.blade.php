@extends('admin.master')
@section('content')







<div class="form-group">
    <label for="">Paidcourse Name</label>
    <input value="{{$paidcourse->name}}"required type="text"    name="paidcourse_name"    class="form-control" id=""  placeholder="Enter Name" input="paidcourse_name">
    @error('paidcourse_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  
  
  
  <div class="form-group">
    <label for="">Description</label>
    <textarea name="paidcourse_description" class="form-control" id="" input="paidcourse_description" cols="10" rows="5">{{ $paidcourse->description }}</textarea>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="">Enter Fees: </label>
    <input value="{{$paidcourse->price}}" required type="number" class="form-control" placeholder="Enter price" name="paidcourse_price"input="paidcourse_price">

    
    @error('paidcourse_price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>

  
 
 
  




@endsection