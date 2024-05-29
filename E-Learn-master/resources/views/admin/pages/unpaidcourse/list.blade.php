@extends('admin.master')
@section('content')
<h1>UnpaidCourse List</h1>
<a href="{{route('unpaidcourse.form')}}" class="btn btn-success">Create Course</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Unpaidcourse name</th>
      <th scope="col">Description</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($unpaidcourses as $unpaidcourse)
    <tr>
      <th scope="row">{{ $unpaidcourse->id }}</th>
      <td>{{$unpaidcourse->name}}</td>
      <td>{{$unpaidcourse->description}}</td>
     <td> <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection