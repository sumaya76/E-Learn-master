<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unpaidcourse;

use Illuminate\Http\Request;

class UnpaidcourseController extends Controller
{
    public function list()

    {

        $unpaidcourses=Unpaidcourse::all();
        return view('admin.pages.unpaidcourse.list',compact('unpaidcourses'));
    }

public function createform(){
    return view('admin.pages.unpaidcourse.form');
}
public function store(Request $request){

    //return($request->all());

    Unpaidcourse::create([
        'name'=>$request->unpaidcourse_name,
        'description'=>$request->unpaidcourse_description
    ]);

    return redirect()->back();

}}

