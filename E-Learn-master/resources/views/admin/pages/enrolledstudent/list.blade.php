@extends('admin.master')
@section('content')
<h1>Enrolled Student</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student_Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Phone_number</th>
      <th scope="col">Transaction_id</th>


      
    

    </tr>
  </thead>
  <tbody>
    @foreach($enrolls as $key=>$enroll)
    <tr>
    <th scope="row">{{$key+1}}</th>
    
      <td>{{$enroll->name}}</td>
      <td>{{$enroll->email}}</td>
      
      <td>{{$enroll->phone_number}}</td>
      <td>{{$enroll->transaction_id}}</td>
      
      
      
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection
