<?php

namespace App\Http\Controllers\Frontend;

use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use App\Models\Paidcourse;
use Illuminate\Http\Request;




class PaidcourseController extends Controller

{
   




    public function  singlePaidcourseView($paidcourseId)
    {
        

        $singlePaidcourse=Paidcourse::find($paidcourseId);
        
        return view('frontend.pages.paidcourse-view',compact('singlePaidcourse'));

    }





    
    public function enrollform($paidcourseId)
{
    $singlePaidcourse=Paidcourse::find($paidcourseId);
return view('frontend.pages.enrollpaidcourse',compact('singlePaidcourse'));
}

public function enrollpaidcourse(Request $request,$paidcourseId)
    {

        $singlePaidcourse=Paidcourse::find($paidcourseId);
        if($singlePaidcourse){
        
            $enrollData =
        [
            'user_id' =>auth()->user()->id,
            'paidcourses_id' => $paidcourseId,
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'nid'=>$request->nid,
            'email'=>$request->email,
            'username'=>$request->username,
            'status' => 'pending',
            
            'total_price' => $singlePaidcourse->price,
            'address' => $request->address,
            'transaction_id' =>date('YmdHis'),



        ];
        Enroll::create($enrollData);

          // Initiating the payment
          $this->payment($enrollData);
       
          //session()->forget('vcart');
    
        notify()->success(' Enrolled successfully.');
        return redirect()->back();
    
    }

   
        
        
    }



    public function payment($newOrder)
{
   # Here you have to receive all the order data to initate the payment.
    # Let's say, your oder transaction informations are saving in a table called "orders"
    # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

    $post_data = array();
    $post_data['total_amount'] = $newOrder['total_price']; # You cant not pay less than 10
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = $newOrder['transaction_id']; // tran_id must be unique

    # CUSTOMER INFORMATION
    $post_data['cus_name'] =  $newOrder['name'];
    $post_data['cus_email'] = 'customer@mail.com';
    $post_data['cus_add1'] = 'Customer Address';
    $post_data['cus_add2'] = "";
    $post_data['cus_city'] = "";
    $post_data['cus_state'] = "";
    $post_data['cus_postcode'] = "";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = '8801XXXXXXXXX';
    $post_data['cus_fax'] = "";

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_phone'] = "";
    $post_data['ship_country'] = "Bangladesh";

    $post_data['shipping_method'] = "NO";
    $post_data['product_name'] = "Computer";
    $post_data['product_category'] = "Goods";
    $post_data['product_profile'] = "physical-goods";

    # OPTIONAL PARAMETERS
    $post_data['value_a'] = "ref001";
    $post_data['value_b'] = "ref002";
    $post_data['value_c'] = "ref003";
    $post_data['value_d'] = "ref004";


    $sslc = new SslCommerzNotification();
    # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    $payment_options = $sslc->makePayment($post_data, 'hosted');

    if (!is_array($payment_options)) {
        print_r($payment_options);
        $payment_options = array();
    }

}







public function mycourselist()
{   $paidcourses=Enroll::with('course')->where('user_id',auth()->user()->id)->get();
    return view('frontend.pages.mycourselist',compact('paidcourses'));
}


public function courses()
{   $paidcourses=Paidcourse::all();
    //dd($paidcourses);
    return view('frontend.pages.courses',compact('paidcourses'));
}


public function paymentinfo($transactionId)
{
   // $order = Enroll::where('transaction_id', $transactionId)->first();

//     if ($order) {
//         // Retrieve order details associated with the order
//         $orderDetails = Enroll::where('paidcourses_id', $order->id)->get();
// //dd( $orderDetails);
//         if ($orderDetails->isNotEmpty()) {
//             // Accessing the first order detail to get book details
//             $firstOrderDetail = $orderDetails->first();
            
//             // Accessing book details from the first order detail
//             $firstOrderDetailPaidcourseName = $firstOrderDetail->paidcourse->paidcourses_name;
//             dd( $firstOrderDetailPaidcourseName);
             
           
//             $firstOrderDetailPaidcourseLink = $firstOrderDetail->paidcourse->paidcourses_link;
            
//             // Accessing price and quantity from OrderDetail
//             $price = $firstOrderDetail->price;
           

//             // Accessing transaction_id from Order
//             $transactionId = $order->transaction_id;
//         } else {
//             // Set default values if no order details found
//             $firstOrderDetailPaidcourseName = null;
//             $firstOrderDetailPaidcourseLink = null;
//             $transactionId = null;
//             $price = null;
          
//         }
//     } else {
//         // Set default values if no order found
//         $firstOrderDetailPaidcourseName = null;
//             $firstOrderDetailPaidcourseLink = null;
//             $transactionId = null;
//             $price = null;
          
//     }
$enroll = Enroll::where('transaction_id', $transactionId)->first();

if ($enroll) {
    $paidcourseId = $enroll->paidcourses_id;
    $paidcourse = Paidcourse::find($paidcourseId);

    if ($paidcourse) {
        $paidcourse_name = $paidcourse->name;
        $paidcourse_link = $paidcourse->link;
        $paidcourse_price = $paidcourse->price;
        $transactionId = $enroll->transaction_id;

        // If you get a valid $paidcourse object here, it means the issue might be with the relationship loading or definition
        
    } else {
        // If $paidcourse is null, it means there's no associated Paidcourse for the Enroll record
        dd('No associated Paidcourse found for this Enroll record.');
    }
} else {
    ('No Enroll record found for the given transaction ID.');
}
    return view('frontend.pages.paymentinfo', compact('enroll', 'paidcourse', 'paidcourse_name','paidcourse_link','transactionId', 'paidcourse_price'));
}
}