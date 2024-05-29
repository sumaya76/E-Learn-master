<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded=[];
    // Define the relationship to orders
    public function transaction()
    {
        return $this->belongsTo(Order::class,'orders_id');    //paidcourses_id ta database er enrolls table theke nite hbe karon course nam er kuno column nai
    }
    // public function book() {
    //     return $this->belongsTo(Book::class, 'book_id');
    // }
    // public function book()
    // {
    //     return $this->belongsTo(Book::class, 'book_id');
    // }
    public function book()

    {
    
        return $this->belongsTo(Book::class);
    
    }
    
    
    public function order()
    
    {
    
        return $this->belongsTo(Order::class);
    
    }
    


}
