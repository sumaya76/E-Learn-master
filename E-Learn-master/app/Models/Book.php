<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function student(){
        return $this->belongsTo(Student::class);
}
public function getBookNameAttribute() {
    return $this->name;
}

public function getBookPdfAttribute() {
    return $this->pdf;
}
public function orders() {
    return $this->hasMany(Order::class, 'order_id','id');
}
// public function orderdetails() {
//     return $this->hasMany(OrderDetails::class, 'orderdetails_id','id');
// }
public function orderDetails()

{

    return $this->hasMany(OrderDetails::class);

}
}