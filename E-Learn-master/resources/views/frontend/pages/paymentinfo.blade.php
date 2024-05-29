@extends('frontend.master')

@section('content')
<div class="container mt-4 print-content"> <!-- Ensure print-content class wraps the content -->
    <div class="card">
        <div class="card-header">
            <h3>Payment and Course Details</h3>
        </div>
        <div class="card-body">
            @if($enroll)
            <div class="mb-3">
                <strong>Transaction ID:</strong> {{ $transactionId }}
            </div>
            <div class="mb-3">
                <strong>course Name:</strong> {{ $paidcourse_name }}
            </div>
            @if($paidcourse_link)
            <div class="mb-3">
            <a href="{{ $paidcourse_link }}">Visit Course</a>
            </div>
            @else
            <div class="mb-3">
                No video available
            </div>
            @endif

            @else
            <div class="alert alert-danger" role="alert">
                No order details found.
            </div>
            @endif
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
