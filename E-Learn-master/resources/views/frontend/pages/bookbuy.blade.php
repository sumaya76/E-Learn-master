@extends('frontend.master')


@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Book Details Section -->
            <div class="card">
                <div class="card-header">
                    Book Details
                </div>
                <div class="card-body">
                    <!-- Fetch and display book details -->
                    <h5 class="card-title">{{ $singleBook->name }}</h5>
                    <p class="card-text">Author: {{ $singleBook->author_name }}</p>
                    <p class="card-text">Price: ${{ $singleBook->book_price }}</p>
                    <!-- You can add more details here -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Payment Options Section -->
            <div class="card">
                <div class="card-header">
                    Payment Options
                </div>
                <div class="card-body">
                    <h5 class="card-title">Choose Payment Method</h5>
                    
                        <input type="hidden" name="book_id" value="{{ $singleBook->id }}">
                        <button type="button" class="btn btn-primary" onclick="payWithNagad()">Pay with Nagad</button>
                        <button type="button" class="btn btn-success" onclick="payWithBkash()">Pay with bKash</button>
                        <button type="button" class="btn btn-info" onclick="payWithVisa()">Pay with Visa Card</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>





@endsection