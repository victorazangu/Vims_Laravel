<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
    public function program()
    {
        return $this->hasMany(Program::class);
    }
}
