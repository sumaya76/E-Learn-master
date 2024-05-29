






    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>KnowledgeNet</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                    
                    <a href="{{route('mycourse')}}" class="nav-item nav-link">My Courses</a>
                    <a href="{{route('courses')}}" class="nav-item nav-link">All Courses</a>
                    <a href="{{route('books')}}" class="nav-item nav-link">Books</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                        <a href="{{route('home')}}" class="dropdown-item">Home</a>
                            <a href="{{route('courses')}}" class="dropdown-item">Courses</a>
                            <a href="{{route('books')}}" class="dropdown-item">Books</a>
                           
                            
                        </div>
                    </div>
                    
                </div>
               
                
                                
                           

                <a class="btn btn-outline-dark" href="{{route('cart.view')}}">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                @if(session()->has('vcart'))
                                    {{ count(session()->get('vcart')) }}
                                @else
                                0
                                @endif
                            </span>
                        </a>
                  
                @guest
                <a href="{{route('customer.login')}}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Log In</a>
                <a href="{{route('customer.registration')}}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Registration</a>
                @endguest
                @auth
                <a href="{{route('customer.logout')}}">Logout</a>|
                <a href="{{route('profile.view')}}">{{auth()->user()->name}}</a>|
                <p class="text-muted font-size-sm">{{auth()->user()->role}}</p>
                @endauth

            </div>
        </nav>
    </div>
    <!-- Navbar End -->

