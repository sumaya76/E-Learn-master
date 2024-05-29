@extends('frontend.master')

@section('content')

<!-- Include necessary Bootstrap CSS and JS -->
<form action="{{ route('paidcourse.search') }}" method="GET">
  
    
</form>

@if(isset($searchType) && isset($results))
    @if($searchType === 'book')
    <h2>Search result for books: "{{ request()->query->get('query') }}" found {{ $results->count() }} books.</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if($results->count() > 0)
                @foreach ($results as $book)
                <div class="team-item">
                    <img class="img-fluid w-100" src="{{url('/uploads/'.$book->logo)}}" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">{{$book->name}}</h5>
                        <p class="mb-2">{{$book->description}}</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="w-100 bg-white text-center p-4" >
                        <a class="btn btn-primary" href="{{route('single.book',$book->id)}}"> Detail</a>
                    </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <h1>No books found.</h1>
                </div>
            @endif
        </div>
    @elseif($searchType === 'course')
        <!-- The existing code for displaying paid courses -->
        <!-- You can keep the same structure as before for displaying paid courses -->
        <h2>Search result for paid courses: "{{ request()->query->get('query') }}" found {{ $results->count() }} paid courses.</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if($results->count() > 0)
                @foreach ($results as $paidcourse)
                <div class="courses-item position-relative">
                <img class="img-fluid" src="{{url('/uploads/'.$paidcourse->image)}}"alt="">
                <div class="courses-text">
                    <h4 class="text-center text-white px-3">{{$paidcourse->name}}</h4>
                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-4">
                            <span class="text-white"><i class="fa fa-user mr-2"></i>{{$paidcourse->description}}</span>
                            <span class="text-white"><i class="fa fa-star mr-2"></i>4.5 <small>(250)</small></span>
                        </div>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >
                        <a class="btn btn-primary" href="{{route('single.paidcourse',$paidcourse->id)}}">Course Detail</a>
                    </div>
                </div>
            </div>   
                @endforeach

                @else

                    <h1>No product found.</h1>
                @endif

</div>

    @endif
@endif





@endsection
