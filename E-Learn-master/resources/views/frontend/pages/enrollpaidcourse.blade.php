@extends('frontend.master')


@section('content')




<form action="{{route('enroll.paidcourse',$singlePaidcourse->id)}}" method='post'>
@csrf
                                       

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Enroll Form</div>
                        <div class="card-body">
                            
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="user_name" class="form-control" name="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name='phone_number'>
                                    </div>
                                </div>

                                

                                

                                <div class="form-group row">
                                    <label for="nid_number" class="col-md-4 col-form-label text-md-right"><abbr
                                                title="National Id Card">NID</abbr> Number</label>
                                    <div class="col-md-6">
                                        <input type="integer" id="nid" class="form-control" name="nid">
                                    </div>
                                </div>

                                    <div class="col-md-6 offset-md-4">
                                        
                                    <!--CREDIT CART PAYMENT-->
            <div class="panel panel-info">
                
                <div class="panel-body">
                    
                   
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="submit" class="btn btn-primary btn-submit-fix">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--CREDIT CART PAYMENT END-->
                                      
                                    </div>
                                </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

</form>

@endsection