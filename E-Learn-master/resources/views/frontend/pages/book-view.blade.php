@extends('frontend.master')


@section('content')
<!-- <div class="team-item">
                    <img class="img-fluid w-100" src="{{url('/uploads/'.$singleBook->logo)}}" alt="">
                    <div class="bg-light text-center p-4">
                        <h5 class="mb-3">{{$singleBook->name}}</h5>
                        <p class="mb-2">{{$singleBook->description}}</p>
                        <p class="mb-2">{{$singleBook->price}}</p>
                        <div class="d-flex justify-content-center">
                            <a class="mx-1 p-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="mx-1 p-1" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >
                        
                        <a type="submit" class="btn btn-primary" href="{{route('cart.view',$singleBook->id)}}">Buy Now</a>
                        <a type="submit" class="btn btn-primary" href="{{route('add.toCart',$singleBook->id)}}">Add to cart</a>

                
            </div>
                </div> -->

<div class="container">
    <div class="row dd-flex justify-content-center">
        <div class="col-md-8">
            <div class="card px-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-row align-items-center"> <i class='fa fa-apple fs-1'></i>
                         <span class="fw-bold ms-1 fs-5"></span> </div>
                        <h1 class="fs-1 ms-1 mt-3">{{$singleBook->name}}</h1>
                        <div class="ms-1"> <span>{{$singleBook->description}}</span> </div>
                        <div class="ms-1"> <span>{{$singleBook->price}} BDT</span> </div>
                        
                        <a type="submit" class="btn btn-primary" href="{{route('add.toCart',$singleBook->id)}}">Add to cart</a>
                    </div>
                    <div class="col-md-6">
                        <div class="product-image"> <img src="{{url('/uploads/'.$singleBook->logo)}}"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                @endsection