@extends('frontend.master')

@section('content')
<div class="container mt-4 print-content"> <!-- Ensure print-content class wraps the content -->
   


<div class="container mt-5">
        <h2>Transaction ID: {{ $transactionId }}</h2>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Order Details</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($orderDetails as $orderDetail)
                        <li class="list-group-item">
                            Book: {{ $orderDetail->book->name }} | Quantity: {{ $orderDetail->quantity }} | Subtotal: {{ $orderDetail->subtotal }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3>Ordered Books</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($books as $book)
                        <li class="list-group-item">
                            <strong>Name:</strong> {{ $book['name'] }} |
                            
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Price: {{ $totalPrice }}.BDT</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print button -->
    <div class="mt-3">
        <button onclick="printPage()" class="btn btn-primary">Print</button>
   
        </div>
</div>

<script>
    function printPage() {
        window.print();
    }
</script>

<link rel="stylesheet" href="{{ asset('/css/frontend/print.css') }}" media="print">


@endsection
