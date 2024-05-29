<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    // Define the relationship to order details
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);}

        public function user()
        {
            return $this->belongsTo(User::class);
        }
        
       
    }

