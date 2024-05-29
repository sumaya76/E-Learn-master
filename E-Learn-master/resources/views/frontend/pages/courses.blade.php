@extends('frontend.master')


@section('content')


<div class="container-fluid px-0 py-5">
    
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                    <h1 class="display-4">Checkout New Releases Of Our Courses</h1>
                </div>
            </div>
        </div>
       
       
            
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
            @foreach ($paidcourses as $paidcourse)

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            
                           
                                <img class="card-img-top" src="{{url('/uploads/'.$paidcourse->image)}}" alt="..."style="max-width: 200px; height: 300px;" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$paidcourse->name}}</h5>
                                       
                                        {{ $paidcourse->price }} .BDT
                                    </div>
                                </div>
                            </a>

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('single.paidcourse',$paidcourse->id)}}">Course Detail</a></div>
                                
                            </div>
                        </div>
                    </div>   
                @endforeach
                

                </div>
                </div>
    <!-- Courses End -->
            
        

            @endsection