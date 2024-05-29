@extends('admin.master')
@section('content')
<h1>Teachers</h1>
<a href="{{route('teacher.form')}}" class='btn btn-primary'>Add Teacher</a>
<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      
      <th scope="col">Teacher_Name</th>
      <th scope="col">Teacher_status</th>
      <th scope="col">Action</th>
    

    </tr>
  </thead>
  <tbody>
    @foreach($teachers as $key=>$teacher)
    <tr>
    <th scope="row">{{$key+1}}</th>
    
      <td>{{$teacher->name}}</td>
      <td>{{$teacher->status}}</td>
      <td>
          <a class="btn btn-success" href="">View</a>
        <a class="btn btn-success" href="{{route('teacher.delete',$teacher->id)}}">Delete</a>
        <a class="btn btn-success" href="{{route('teacher.edit',$teacher->id)}}">Edit</a>

      </td>
      
      
    </tr>
    @endforeach
    
  </tbody>
</table>
{{$teachers->links()}}


@endsection
