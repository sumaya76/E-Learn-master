
@extends('admin.master')
@section('content')


<form action="{{route('paid.update',$paidcourse->id)}}" method="post">
@csrf
@method('put')







<div class="form-group">
    <label for="">Paidcourse Name</label>
    <input value="{{$paidcourse->name}}"required type="text"    name="paidcourse_name"    class="form-control" id=""  placeholder="Enter Name" input="paidcourse_name">
    @error('paidcourse_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  
  
  
  <div class="form-group">
  <label for="">Enter Product Description:</label>
   <textarea class="form-control" placeholder="Enter product short description" name="paidcourse_description" id="" cols="30" rows="5">{{$paidcourse->description}}</textarea>
  </div>
  

  <div class="form-group">
    <label for="">Enter Fees: </label>
    <input value="{{$paidcourse->price}}" required type="number" class="form-control" placeholder="Enter price" name="paidcourse_price">

    
    @error('paidcourse_price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>

  
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection



