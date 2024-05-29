@extends('frontend.master')
@section('content')
<h1>My Courses</h1>

<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      
      <th scope="col">Course Id</th>
      <th scope="col">Course Name</th>
      <th scope="col"></th>
      
    

    </tr>
  </thead>
  <tbody>
    @foreach($paidcourses as $key=>$paidcourse)
    <tr>
    <th scope="row">{{$key+1}}</th>
    <td>{{$paidcourse->course->id}}</td>
    
      <td>{{$paidcourse->course->name}}</td>
      
      
      
    </tr>
    @endforeach
    
  </tbody>
</table>



@endsection
