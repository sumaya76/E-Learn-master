@extends('admin.master')
@section('content')
<h1>Paidcourse</h1>
<a href="{{route('paidcourse.form')}}" class='btn btn-primary'>Create paidcourse</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Paidcourse Name</th>
     
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($paidcourses as $paidcourse)
    <tr>
      <th scope="row">{{ $paidcourse->id }}</th>
      <td>{{$paidcourse->name}}</td>
      
      <td>{{$paidcourse->price}}</td>
      
      <td>
      <img width="20%" src="{{url('/uploads/'.$paidcourse->image)}}" alt=""></td>
      
      
      <td><a class="btn btn-success" href="{{route('paid.view',$paidcourse->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('paid.edit',$paidcourse->id)}}">Edit</a>
      <a class="btn btn-secondary" href="{{route('paid.delete',$paidcourse->id)}}">Delete</a>
</td>
      
    
    </tr>
    @endforeach
  </tbody>
</table>
{{ $paidcourses->links() }}
@endsection