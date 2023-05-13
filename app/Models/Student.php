<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        // 'password',
        'phone',
        'profile',
        'program',
        'status',
        'country',
        'state',
        'city',
        'address',
        'id_no',
        'adm_no',
        'gender',
        'dob'
    ];
}
