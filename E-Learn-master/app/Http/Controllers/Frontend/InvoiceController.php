<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

use App\Models\OrderDetail;
use App\Models\Book;
use App\Models\OrderDetails;

class InvoiceController extends Controller
{
    public function show($transactionId)
    {
    //     $order = Order::where('transaction_id', $transactionId)->first();

    //     if ($order) {
    //         // Retrieve order details associated with the order
    //         $orderDetails = OrderDetails::where('order_id', $order->id)->get();

    //         if ($orderDetails->isNotEmpty()) {
    //             // Accessing the first order detail to get book details
    //             $firstOrderDetail = $orderDetails->first();
                
    //             // Accessing book details from the first order detail
    //             $firstOrderDetailBookName = $firstOrderDetail->book->book_name;
                 
               
    //             $firstOrderDetailBookPdf = $firstOrderDetail->book->book_pdf;
                
    //             // Accessing price and quantity from OrderDetail
    //             $price = $firstOrderDetail->subtotal;
    //             $quantity = $firstOrderDetail->quantity;

    //             // Accessing transaction_id from Order
    //             $transactionId = $order->transaction_id;
    //         } else {
    //             // Set default values if no order details found
    //             $firstOrderDetailBookName = null;
    //             $firstOrderDetailBookPdf = null;
    //             $transactionId = null;
    //             $price = null;
    //             $quantity = null;
    //         }
    //     } else {
    //         // Set default values if no order found
    //         $firstOrderDetailBookName = null;
    //         $firstOrderDetailBookPdf = null;
    //         $transactionId = null;
    //         $price = null;
    //         $quantity = null;
    //     }

    //     return view('frontend.pages.invoice', compact('order', 'firstOrderDetailBookName', 'firstOrderDetailBookPdf', 'transactionId', 'price', 'quantity'));
    // }
    // }
    $order = Order::with('orderDetails.book')->where('transaction_id', $transactionId)->firstOrFail();

    // Retrieve transaction ID from the order
    $transactionId = $order->transaction_id;
    $totalPrice = $order->total_price;

    // Retrieve order details from the order
    $orderDetails = $order->orderDetails;

    // Prepare an array to store book names and PDF links
    $books = [];
    foreach ($orderDetails as $orderDetail) {
        $books[] = [
            'name' => $orderDetail->book->name,
            'pdf' => $orderDetail->book->pdf,
        ];
    }

    // Pass the data to your view
    return view('frontend.pages.invoice', [
        'transactionId' => $transactionId,
        'orderDetails' => $orderDetails,
        'books' => $books,
        'totalPrice' => $totalPrice
    ]);
}}