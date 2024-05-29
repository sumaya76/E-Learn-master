<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function course()
    {
        return $this->belongsTo(Paidcourse::class,'paidcourses_id');    //paidcourses_id ta database er enrolls table theke nite hbe karon course nam er kuno column nai
    }
    public function transaction()
    {
        return $this->belongsTo(Enroll::class,'orders_id');    //paidcourses_id ta database er enrolls table theke nite hbe karon course nam er kuno column nai
    }
    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function paidcourse()
    {
        return $this->belongsTo(Paidcourse::class, 'paidcourses_id','id');
    }
    // public function paidcourse()
    // {
    //     return $this->belongsTo(Paidcourse::class);
    // }

}
