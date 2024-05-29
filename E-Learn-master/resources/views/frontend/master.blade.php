<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @notifyCss
    <title>KnowledgeNet- Online Education Website </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/uploads/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/uploads/css/style.css" rel="stylesheet">
</head>

<body>
@include('frontend.partials.header') 












    <!-- Header Start -->

    <!-- <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;"> -->
    <div class="container-fluid position-relative overlay-top overlay-bottom bg-dark text-white-50 py-5" style="margin-top: 90px;">
    <!-- <div class="jumbotron jumbotron-fluid position-relative overlay-bottom bg-danger" style="margin-bottom: 90px;"> -->
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
            <h1 class="text-white display-1 mb-5">Education Courses</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    
                    <form action="{{route('paidcourse.search')}}" method="get">
                    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <select class="custom-select" name="search_type">
                <option value="book">Search Books</option>
                <option value="course">Search Courses</option>
            </select>
        </div>
        <input type="text" class="form-control" placeholder="Enter your query" name="query">
        <div class="input-group-append">
            <button class="btn btn-primary"  type="submit">Search</button>
        </div>
    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    @include('notify::components.notify')

    


<!-- About Start -->
<div class="container-fluid py-5">
       
    <!-- About End -->


    <!-- Courses Start -->
    
        @yield('content')
        
          
    <!-- Courses End -->


    


    
    
       
       </div>


















    <!-- Footer Start -->
    @include('frontend.partials.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/counterup/counterup.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!--Template Javascript -->
     <script src="/uploads/js/main.js"></script>

    <script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
    @notifyJs
</body>

</html>