<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::paginate(5);
        return view('lecturers.index', compact('lecturers'));
    }

    public function show(Lecturer $lecturer)
    {
        return view('lecturers.show', compact('lecturer'));
    }
}
