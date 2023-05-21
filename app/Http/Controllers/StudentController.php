<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;




class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        $programs = Program::all();

        return view('students.index', compact('students', 'programs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('students.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'program_id' => 'required',
            'status' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'id_no' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'profile' => 'required|image',
        ]);
    
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $program_id = $request->input('program_id');
        $status = $request->input('status');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
        $address = $request->input('address');
        $id_no = $request->input('id_no');
        $gender = $request->input('gender');
        $dob = $request->input('dob');
    
        // Retrieve the program name based on the program_id
        $program = Program::findOrFail($program_id);
        $program_name = $program->name;
    
        // Generate the admission number (adm_no)
        $year = Carbon::now()->format('Y');
        $unique_number = Str::uuid()->toString();
        $adm_no = $program_name . '/' . $year . '/' . $unique_number;
    
        // File upload
        $profile = 'storage/' . $request->file('profile')->store('profiles', 'public');
    
        $student = new Student();
        $student->name = $name;
        $student->adm_no = $adm_no;
        $student->email = $email;
        $student->phone = $phone;
        $student->program_id = $program_id;
        $student->status = $status;
        $student->country = $country;
        $student->state = $state;
        $student->city = $city;
        $student->address = $address;
        $student->id_no = $id_no;
        $student->gender = $gender;
        $student->dob = $dob;
        $student->profile = $profile;
    
        $student->save();
    
        return redirect()->route('students')->with('success', 'Student has been created successfully.');
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
