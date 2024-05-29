@extends('admin.master')
@section('content')


@section('content')
    <div class="container">
        <h1>Order Payment List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Receiver_name</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Transaction_id</th>
                    <th scope="col">Action</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->receiver_name }}</td>
                            <td>{{ $orderDetail->book->name }}</td>
                            <td>{{ $orderDetail->quantity }}</td>
                            
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->transaction_id}}</td>
                            <td><a class="btn btn-success" href="{{route('orderpayment.report',$order->id)}}">View</a>
                            
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



 

    