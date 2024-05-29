@extends('admin.master')
@section('content')
<h1>Books</h1>
<a href="{{route('book.form')}}" class='btn btn-primary'>Add Book</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author Name</th>
      
      
      <th scope="col">Logo</th>
  
     
      <th scope="col">Price</th>
      <th scope="col">Book Status</th>
      <th scope="col">Book Action</th>
     

    </tr>
  </thead>
  <tbody>
    @foreach($books as $key=>$book )
    <tr>
      <th scope="row">{{$book->id}}</th>
      <td>{{$book->name}}</td>
     
      <td>{{$book->author_name}}</td>
     
      <td><img width="20%" src="{{url('/uploads/'.$book->logo)}}" alt=""></td>
     
      <td>{{$book->price}}</td>
      <td>{{$book->status}}</td>
   <td>
      <a class="btn btn-primary" href="{{route('book.edit',$book->id)}}">Edit</a>
      <a class="btn btn-secondary" href="{{route('book.delete',$book->id)}}">Delete</a>
</td>
     
     
    </tr>
    @endforeach
  </tbody>
</table>
@endsection