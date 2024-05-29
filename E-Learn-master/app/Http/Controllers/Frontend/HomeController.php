<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Paidcourse;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {   
        $books=Book::all();
        $paidcourses=Paidcourse::all();
        //dd($paidcourses);
        return view('frontend.pages.home',compact('paidcourses','books'));
 
    }


    public function search(Request $request)
    {
       

        // if($request->search)
        // {
        //     $paidcourses=Paidcourse::where('name','LIKE','%'.$request->search.'%')->get();
            
        // }else{
        //     $paidcourses=Paidcourse::all();
        // }
       

        
        // return view("frontend.pages.search",compact('paidcourses'));

       
        $searchType = $request->input('search_type');
        $query = $request->input('query');

        if ($searchType === 'book') {
            $results = Book::where('name', 'like', '%' . $query . '%')->get();
        } elseif ($searchType === 'course') {
            $results = Paidcourse::where('name', 'like', '%' . $query . '%')->get();
        } else {
            // Handle other cases or show an error
            $results = [];
        }

        return view('frontend.pages.search', compact('results', 'searchType'));






    }
    public function productsUnderCategory($book_id)
    {
        
        $productsUnderCategory=Book::where('book_id',$book_id)->get();
        // $products=Product::whereIn('category_id',[4,5])->get();
        return view('frontend.pages.products-under-category',compact('productsUnderCategory'));
    }
}


