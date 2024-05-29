<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Paidcourse;
use App\Models\Teacher;
use App\Models\Enroll;
use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    public function list(){
        $students = User::where('role', 'student')->get();
        return view('admin.pages.student.list',compact('students'));
    }


    public function delete($id){

        $student=User::find($id);
        if($student){
            $student->delete($id);
            notify()->success(' Deleted Successfully.');
      return redirect()->back();
        }
    }



    public function createform(){
        

        return view('admin.pages.student.form');
    }
    public function store(Request $request){
        $validate=Validator::make($request->all(),[
        
        'student_name'=>'required',
       



        ]);
        if($validate->fails())
        {
  
          // notify()->error($validate->getMessageBag());
          // return redirect()->back();
  
          return redirect()->back()->withErrors($validate);
        }
    //dd($request->all());
    Student::create([


        
       
        'name'=>$request->student_name,
        'email'=>$request->student_email

    ]);
    return redirect()->back();
    }





    public function enrolllist(){
        $enrolls=Enroll::all();
        return view('admin.pages.enrolledstudent.list',compact('enrolls'));



}
    
public function orderpaymentlist()
{
    // Eager load the associated data for each order
    $orders = Order::with(['orderDetails.book', 'user'])->get();

    return view('admin.pages.order_details.list', compact('orders'));
}
public function orderpaymentreport($id)
{
    // Eager load the associated data for the specific order
    $order = Order::with(['orderDetails.book', 'user'])->find($id);

    if (!$order) {
        // Handle the case where the order with the given id is not found
        abort(404);
    }

    return view('admin.pages.order_details.report', compact('order'));
}

}























