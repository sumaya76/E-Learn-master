<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Paidcourse;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class PaidcourseController extends Controller
{
    public function list(){
    $paidcourses=Paidcourse::paginate(10);


    // {  $paidcourses=Paidcourse::orderBy('name', 'desc')->paginate(10);
       // $paidcourses=Paidcourse::paginate(2);
        return view('admin.pages.paidcourse.list',compact('paidcourses'));
    }

    public function view($id){

        $paidcourse=Paidcourse::find($id);
        
        return view('admin.pages.paidcourse.view',compact('paidcourse'));
    }
    public function delete($id){

      try {
        $paidcourse = Paidcourse::find($id);

        if ($paidcourse) {
            $paidcourse->delete();
            notify()->success('Deleted Successfully.');
        } else {
            notify()->warning('Course not found.');
        }
    } catch (QueryException $e) {
        // Check if the exception is due to a foreign key constraint violation
        if ($e->errorInfo[1] == 1451) {
            notify()->error('Cannot delete the course. It has related records in enrolls tables.');
        } else {
            notify()->error('An error occurred while deleting the course.');
        }
    }

    return redirect()->back();
    }

    public function edit($id)
    {
      $paidcourse=Paidcourse::find($id);

   

      return view('admin.pages.paidcourse.edit',compact('paidcourse'));
     
    }

    public function update(Request $request,$id)
    {
        $paidcourse=Paidcourse::find($id);

        if($paidcourse)
        {

          $fileName=$paidcourse->image;
          if($request->hasFile('image'))
          {
              $file=$request->file('image');
              $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
             
              $file->storeAs('/uploads',$fileName);
    
          }
         
          

          $paidcourse->update([
            
                'name'=>$request->paidcourse_name,
                'price'=>$request->paidcourse_price,
                'description'=>$request->paidcourse_description,
                'image'=>$fileName,
                
              
                
          ]);

          notify()->success('Paidcourse updated successfully.');
          return redirect()->back();
        
    }
  }







    public function createform()
    { $teachers=Teacher::all();
        return view('admin.pages.paidcourse.form',compact('teachers'));
    }
    public function store(Request $request)

{ 
  //dd($request->all());
    
    $validate=Validator::make($request->all(),[
            
            
            'paidcourse_name'=>'required',
           
            'paidcourse_price'=>'required|numeric|min:10',
            
           
        
    //return dd($request->all());
]);

if($validate->fails())
{
  return redirect()->back()->withErrors($validate);
}
  $fileName=null;
      if($request->hasFile('image'))
      {
          $file=$request->file('image');
          $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
         
          $file->storeAs('/uploads',$fileName);

      }
     
   




    Paidcourse::create(
        [
            
                'name'=>$request->paidcourse_name,
                'price'=>$request->paidcourse_price,
               // 'link'=>$linkName,
               'link'=>$request->paidcourse_link,
                'description'=>$request->paidcourse_description,
               
                'image'=>$fileName
        ]
    );

    return redirect()->back();

}}

