<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class CustomerController extends Controller
{
  public function registration()
  {
    return view('frontend.pages.registration');
    
  }
  public function profileview()
  {
    return view('frontend.pages.profile');
  }


public function profileedit(){
 
  return view('frontend.pages.profileedit');
}



public function profileupdate(Request $request) {
  $validate = Validator::make($request->all(), [
      'name' => 'required|min:2',
      'email' => 'required|email',
  ]);  

  if ($validate->fails()) {
      notify()->error('Error');
      return redirect()->back();
  }

  $user = User::find(auth()->user()->id);
  
  if ($user) {
      $userData = [
          'name' => $request->name,
          'email' => $request->email,
      ];

      // Check if a new password is provided
      if (!empty($request->password)) {
          $userData['password'] = bcrypt($request->password);
      }

      $user->update($userData);

      notify()->success('Updated successfully');
      return redirect()->back();
  }
}






  public function store(Request $request){
    try {
    //dd($request->all());
    User::create([
        'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'student',
            'password'=>bcrypt($request->password),




    ]);
    notify()->success('Registration Successful!!');
    return redirect()->route('customer.login');
  }
  catch (QueryException $e) {

    if ($e->errorInfo[1] == 1062) {

        notify()->error('Email address already exists');

        return redirect()->back();

    }


    throw $e;

}

}

  public function login()
  {
    return view('frontend.pages.login');
  }
  public function dologin(Request $request)
  {
    
$credentials=$request->except('_token');

if(auth()->attempt($credentials)){
    notify()->success('successfully logged in');
    return redirect()->route('home');

}
notify()->error('Invalid ');
return redirect()->back();
  }
  public function logout(){
    auth()->logout();
    notify()->success('succesfully logout');
    return redirect()->back();
  }
}
