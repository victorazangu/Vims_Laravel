<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

    public function index()
    {
        $programs = Program::paginate(8);
        return view('programs.index', compact('programs'));
    }
}
