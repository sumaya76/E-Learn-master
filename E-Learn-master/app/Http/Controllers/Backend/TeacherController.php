<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;



class TeacherController extends Controller
{
    public function list(){
        $teachers=Teacher::paginate(2);
        return view('admin.pages.teacher.list',compact('teachers'));
     
    }
    public function delete($id){

        $teacher=Teacher::find($id);
        if($teacher){
            $teacher->delete($id);
            notify()->success(' Deleted Successfully.');
      return redirect()->back();
        }
    }

    public function edit($id){
        $teacher=Teacher::find($id);
        return view('admin.pages.teacher.edit',compact('teacher'));
        
    }
    public function update(Request $request,$id){
        $teacher=Teacher::find($id);
        if($teacher){
            $teacher->update([
                'name'=>$request->name,
                'description'=>$request->teacher_description
        
                

            ]);
            notify()->success(' updated successfully.');
            return redirect()->back();
        }

    }



    public function createform(){
        
        return view('admin.pages.teacher.form');
    }
    
    public function store(Request $request){
    //dd($request->all());
    Teacher::create([


        
        
        'name'=>$request->name,
        'description'=>$request->teacher_description

    ]);
    return redirect()->back();
    }
    }

