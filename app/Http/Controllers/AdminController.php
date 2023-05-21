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
        $admins = User::paginate(5);
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
    public function update(Request $request, User $admin)
    {
        if (User::where("id", $admin->id)->exists()) {
            $request->validate([
                'profile' => 'required|file|mimes:jpeg,png|max:2048',
            ]);
            $admin = User::find($admin->id);
            $password = Hash::make($request->password);
            $profile = 'storage/' . $request->file('imagePath')->store('postsImages', 'public');

            $admin->firstName = !empty($request->firstName) ? $request->firstName : $admin->firstName;
            $admin->lastName = !empty($request->lastName) ? $request->lastName : $admin->lastName;
            $admin->email = !empty($request->email) ? $request->email : $admin->email;
            $admin->phone = !empty($request->phone) ? $request->phone : $admin->phone;
            $admin->designation = !empty($request->designation) ? $request->designation : $admin->designation;
            $admin->description = !empty($request->description) ? $request->description : $admin->description;
            $admin->gender = !empty($request->gender) ? $request->gender : $admin->gender;
            $admin->currentAddress = !empty($request->currentAddress) ? $request->currentAddress : $admin->currentAddress;
            $admin->permanentAddress = !empty($request->permanentAddress) ? $request->permanentAddress : $admin->permanentAddress;
            $admin->dob = !empty($request->dob) ? $request->dob : $admin->dob;
            $admin->profile = !empty($profile) ? $profile : $admin->profile;
            $admin->status = !empty($request->status) ? $request->status : $admin->status;
            $admin->password = !empty($password) ? $password : $admin->password;
            //save the updates
            $admin->save();
            return redirect(route('admin_edit', $admin))->with('status', 'Admin Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins')->with('success','Admin has been deleted successfully');
    }
}
