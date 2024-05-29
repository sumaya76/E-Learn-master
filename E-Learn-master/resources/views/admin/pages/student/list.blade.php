@extends('admin.master')
@section('content')
<h1>Students</h1>
<!-- <a href="{{route('student.form')}}" class='btn btn-primary'>Add Student</a> -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student_Name</th>
      <th scope="col">Student_Email</th>
     
      
      
      
    

    </tr>
  </thead>
  <tbody>
    @foreach($students as $key=>$student)
    <tr>
    <th scope="row">{{$key+1}}</th>
    
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
     
   
        

     
      
      
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection
