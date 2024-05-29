@extends('admin.master')

@section('content')
<h1>User List</h1>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
     
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $key=>$singleUser)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$singleUser->name}}</td>
        
        <td>{{$singleUser->email}}</td>
        <td>{{$singleUser->role}}</td>
        

    </tr>
        
    @endforeach


   

    
  </tbody>
</table>
@endsection