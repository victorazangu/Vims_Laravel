<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
    public function school_class()
    {
        return $this->hasMany(SchoolClass::class);
    }
    public function course()
    {
        return $this->hasMany(SchoolClass::class);
    }
   
}
