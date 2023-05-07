<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'designation' => 'required',
            'status' => 'required',
        ]);
        $password = Hash::make("12345678");

        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'status' => $request->status,
            'password' => $password,
        

        ]);

        // auth()->attempt($request->only('email', 'password'));

        return redirect()->route('admins.index')->with('success', 'Admin created successfully');
    }
}
