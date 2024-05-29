
@extends('frontend.master')


@section('content')

<!-- <div class="owl-carousel courses-carousel"> -->
<!-- <div class="courses-item position-relative">
<img class="img-fluid" src="{{url('/uploads/'.$singlePaidcourse->image)}}"alt="">
                <div class="courses-text">
                    <h4 class="text-center text-white px-3">{{$singlePaidcourse->name}}</h4>
                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-4">
                            <span class="text-white"><i class="fa fa-user mr-2"></i>{{$singlePaidcourse->description}}</span>
                           
                        </div>
                    </div>
                    <div class="w-100 bg-white text-center p-4" >
                        
                                <a type="submit" class="btn btn-primary" href="{{route('frontendenroll.form',$singlePaidcourse->id)}}">Enroll Now</a>

                        </form>
                    </div>
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
                        <h1 class="fs-1 ms-1 mt-3">{{$singlePaidcourse->name}}</h1>
                        <div class="ms-1"> <span>{{$singlePaidcourse->description}}</span> </div>
                        <div class="ms-1"> <span>{{$singlePaidcourse->price}} BDT</span> </div>
                        
                        <a type="submit" class="btn btn-primary" href="{{route('frontendenroll.form',$singlePaidcourse->id)}}">Enroll Now</a>
                    </div>
                    <div class="col-md-6">
                        <div class="product-image"> <img src="{{url('/uploads/'.$singlePaidcourse->image)}}"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            @endsection


