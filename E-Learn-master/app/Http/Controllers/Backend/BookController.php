<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class BookController extends Controller
{public function list(){
    $books=Book::with(['student'])->orderBy('created_at', 'asc')->paginate(10);
    return view('admin.pages.book.list',compact("books"));
}
// public function delete($id)
// {
//   $book=Book::find($id);
//   if($book)
//   {
//     $book->delete();
//   }

//   notify()->success(' Deleted Successfully.');
//   return redirect()->back();
// }
public function delete($id)
{
    try {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            notify()->success('Deleted Successfully.');
        } else {
            notify()->warning('Book not found.');
        }
    } catch (QueryException $e) {
        // Check if the exception is due to a foreign key constraint violation
        if ($e->errorInfo[1] == 1451) {
            notify()->error('Cannot delete the book. It has related records in other tables.');
        } else {
            notify()->error('An error occurred while deleting the book.');
        }
    }

    return redirect()->back();
}

public function edit($id)
{
  $book=Book::find($id);

  $students=Student::all();
  

  return view('admin.pages.book.edit',compact('students','book'));
 
}

public function update(Request $request,$id)
{
    $book=Book::find($id);

    if($book)
    {

      $fileName=$book->logo;
      if($request->hasFile('logo'))
      {
          $file=$request->file('logo');
          $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
         
          $file->storeAs('/uploads',$fileName);

      }

      $book->update([
        'name'=>$request->book_name,
'description'=>$request->book_description,
'price'=>$request->book_price,
'logo'=>$fileName,
'author_name'=>$request->author_name,


            
      ]);

      notify()->success(' updated successfully.');
      return redirect()->back();
    }
  }
// $book = Book::find($id);

// if ($book) {
//     $this->validate($request, [
//         'book_name' => 'required|string',
        
//         'book_price' => 'required|numeric',
//         'author_name' => 'required|string',
        
//     ]);

//     $fileName = $book->logo;

//     if ($request->hasFile('logo')) {
//         $file = $request->file('logo');
//         $fileName = date('Ymdhis').'.'.$file->getClientOriginalExtension();
//         $file->storeAs('/uploads', $fileName);
//     }

//     $book->update([
//         'name' => $request->book_name,
//         'description' => $request->book_description,
//         'price' => $request->book_price,
//         'logo' => $fileName,
//         'author_name' => $request->author_name,
//     ]);

//     notify()->success('Product updated successfully.');
// } else {
//     notify()->error('An error occurred while updating the book.');
// }

// return redirect()->back();
// }













public function createform(){
    $students=Student::all();
    return view('admin.pages.book.form',compact("students"));
}
public function store(Request $request){

    $validate=Validator::make($request->all(),[
     'book_name'=>'required',
     'author_name'=>'required',
     'logo'=>'required',
     
     'book_price'=>'required|numeric'
    ]);

    if($validate->fails()){
        return redirect()->back()->withErrors($validate);
    }
    $fileName=null;
    if($request->hasFile('logo'))
    {
        $file=$request->file('logo');
        $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
       
        $file->storeAs('/uploads',$fileName);

    }

    $pdfName=null;
    if($request->hasFile('pdf'))
    {
        $file=$request->file('pdf');
        $pdfName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
       
        $file->storeAs('/uploads/pdf',$pdfName);

    }




Book::create([

'name'=>$request->book_name,
'description'=>$request->book_description,
'logo'=>$fileName,
'price'=>$request->book_price,
'author_name'=>$request->author_name,

'pdf'=>$pdfName,




]);
return redirect()->back();

}
    
}
