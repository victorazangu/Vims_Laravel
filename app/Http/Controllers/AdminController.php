<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();
        return view('admins.index', compact('admins'));
    }


    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (User::where("id", $user->id)->exists()) {

            $user = User::find($user->id);
            $password = Hash::make($request->password);
            $profile = 'storage/' . $request->file('profile')->store('profiles', 'public');

            $user->firstName = !empty($request->firstName) ? $request->firstName : $user->firstName;
            $user->lastName = !empty($request->lastName) ? $request->lastName : $user->lastName;
            $user->email = !empty($request->email) ? $request->email : $user->email;
            $user->phone = !empty($request->phone) ? $request->phone : $user->phone;
            $user->designation = !empty($request->designation) ? $request->designation : $user->designation;
            $user->description = !empty($request->description) ? $request->description : $user->description;
            $user->gender = !empty($request->gender) ? $request->gender : $user->gender;
            $user->currentAddress = !empty($request->currentAddress) ? $request->currentAddress : $user->currentAddress;
            $user->permanentAddress = !empty($request->permanentAddress) ? $request->permanentAddress : $user->permanentAddress;
            $user->dob = !empty($request->dob) ? $request->dob : $user->dob;
            $user->profile = !empty($profile) ? $profile : $user->profile;
            $user->status = !empty($request->status) ? $request->status : $user->status;
            $user->password = !empty($password) ? $password : $user->password;
            //save the updates
            $user->save();
            return redirect(route('admin_edit', $user))->with('status', 'Admin Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
    }
}
