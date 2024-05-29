@extends('admin.master')
@section('content')
<h1>UnpaidCourse List</h1>
<!-- <a href="{{route('exam.form')}}" class="btn btn-success">Create Course</a> -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Course name</th>
      <th scope="col">Exam Date</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($exams as $key=$exam)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{$Exam->name}}</td>
      <td>{{$Exam->date}}</td>
     <td> <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection