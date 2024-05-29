

@extends('admin.master')

@section('content')
<div class="container">
        <h1 class="text-center mb-4">Order Payment Report</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Receiver_Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Receiver_Phone_No</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Transaction_id</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->receiver_name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->receiver_mobile }}</td>
                        <td>{{ $orderDetail->book->name }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->transaction_id }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    </div>

    <!-- Additional styling for printing -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
    </style>
@endsection
