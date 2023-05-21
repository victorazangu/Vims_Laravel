@extends('layouts.app')
@section('page')
<h1 class="text-3xl text-black pb-6">Create Student</h1>
@endsection
@section('content')

<section class="bg-white dark:bg-gray-900">
    <form class="space-y-6" action="{{ route('students_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                <div class="m-4">

                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                        Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="John Doe">
                    @error('name')

                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>

                    @enderror

                </div>
                <div class="m-4">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="john@gmail.com">
                    </div>
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country
                    </label>
                    <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Country">
                </div>
                <div class="m-4">
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City
                        </label>
                        <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="City">
                    </div>
                    @error('city')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="m-4">
                    <div>
                        <label for="id_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id No
                        </label>
                        <input type="text" name="id_no" id="id_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Id No">
                    </div>

                    @error('id_no')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="m-4">
                    <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of
                        Birth
                    </label>
                    <input type="date" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="date of Birth">
                    @error('dob')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                <div class="m-4">
                    <div>
                        <label for="program" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">program
                        </label>
                        <select id="program" name="program" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Program</option>
                            @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('program')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="text" placeholder="Phone Number" value="{{ old('phone') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('phone')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="m-4">

                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        State</label>
                    <input type="text" name="state" id="state" placeholder="State" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>


                <div class="m-4">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">address
                    </label>
                    <input type="text" name="address" id="address" placeholder="Address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    @error('address')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender
                    </label>
                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>

                    </select>
                    @error('gender')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="m-4">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    </label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="suspended">Suspended</option>

                    </select>
                    @error('status')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="flex w-80 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                Student</button>
        </div>
    </form>
</section>
@endsection