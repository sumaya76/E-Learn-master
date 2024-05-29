@extends('frontend.master')


@section('content')
<!-- About Start -->

        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="/uploads/img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title bg-white position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                        <h1 class="display-4">First Choice For Online Education Anywhere</h1>
                    </div>
                    <p>Welcome to our online learning hub! We're here to make learning easy and enjoyable for everyone. Our website is designed to help you learn at your own pace, wherever you are.

Students, you can join our courses and watch course videos to expand your knowledge. Plus, our bookstore has a wide variety of books that you can buy and download to deepen your learning.

Behind the scenes, our team is always working hard to bring you new courses and books. We want to make sure you have plenty of options to explore and learn from.

Our goal is simple: to make learning accessible and fun. Come join us on this educational journey where you can enroll in courses, watch videos, grab books, and discover more about the things you love to learn!</p>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose Us?</h6>
                        <h1 class="display-4">Why You Should Start Learning with Us?</h1>
                    </div>
                    <p class="mb-4 pb-2">At our online learning hub, we're committed to enhancing your learning experience:</p>
                    
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Book Collection</h4>
                            <p>We have a wide variety of books on our platform that are chosen specifically to help you in your learning. Each book gives important information to make your learning experience better and more complete.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Flexible Online Learning</h4>
                            <p class="m-0">We offer adaptable online classes designed to accommodate your schedule. Learn at your convenience, from any location, and access course materials whenever it suits you. Our flexible approach empowers you to balance learning with your commitments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="/uploads/img/feature.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->


    <!-- Courses Start -->
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
            
        







        
   


   
    
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title text-center position-relative mb-5">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Books</h6>
                <h1 class="display-4">Available </h1>
            </div>



            



                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    @foreach ($books as $book)
        
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Sale badge-->
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                                    <!-- Product image-->
                                    
                                   
                                        <img class="card-img-top" src="{{url('/uploads/'.$book->logo)}}" alt="..."style="max-width: 200px; height: 300px;" />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">{{$book->name}}</h5>
                                               
                                                {{ $book->price }} .BDT
                                            </div>
                                        </div>
                                    </a>
        
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('single.book',$book->id)}}">Book Detail</a></div>
                                        
                                    </div>
                                </div>
                            </div>   
                        @endforeach
                        
                        </div>
                </div>
                </div>



    

@endsection