<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    //
    public function index()
    {
        $courses = Course::paginate(8);
        return view('courses.index', compact('courses'));
    }
}
