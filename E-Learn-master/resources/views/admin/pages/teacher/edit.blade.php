@extends('admin.master')
@section('content')

<form action="{{route('teacher.update',$teacher->id)}}" method="post">
@csrf
@method('put')

    <div class="form-group">
    <label for="">Teacher Name</label>
    <input value="{{$teacher->name}}" type="text" class="form-control" id=""  placeholder="Enter Name" name="name">
    
   
  </div>
 


  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" class="form-control" id="" name="teacher_description" cols="10" rows="5">{{$teacher->description}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection








