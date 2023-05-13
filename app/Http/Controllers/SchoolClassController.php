<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{

    public function index()
    {
        //
        $classes = SchoolClass::paginate(8);
        return view('classes.index', compact('classes'));
    }
}
