<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);

        return view('students.index', compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        function updateStudentAdmNo($student_id, $year, $program) {
            $prog_abr = explode(" ", $program);
            $ArrayOfProgramAbr = array();
            for ($i = 0; $i < count($prog_abr); $i++) {
                array_push($ArrayOfProgramAbr, strtoupper($prog_abr[$i][0]));
            }
            $abriviationOfProgram = implode("", $ArrayOfProgramAbr);
            $newAdmNo = $abriviationOfProgram . "/" . $year . "/" . $student_id;
            return $newAdmNo;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
