<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paidcourse extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function getPaidcourseNameAttribute() {
        return $this->name;
    }
    
    public function getPaidcourseLinkAttribute() {
        return $this->link;
    }
    public function enrolls() {
        return $this->hasMany(Enroll::class, 'paidcourses_id','id');
    }
    // public function enroll()
    // {
    //     return $this->hasOne(Enroll::class);
    // }
}
