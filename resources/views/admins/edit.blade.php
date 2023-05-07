@extends('layouts.app')
@section('page')
    {{ $admin->firstName }} {{ $admin->lastName }}
@endsection

@section('content')
    <div class="bg-gray-100">

     
            <form class="w-full text-white bg-main-color" method="post" action="{{ route('admin_update')}}">
    
                <div class="container mx-auto my-5 p-5">
                    <div class="md:flex no-wrap md:-mx-2 ">
                        <!-- Left Side -->
                        <div class="w-full md:w-3/12 md:mx-2">
                            <!-- Profile Card -->
                            <div class="bg-white p-3 border-t-4 border-green-400">
                                <div class="image overflow-hidden">
                                    <img class="h-auto w-full mx-auto" src="{{ asset('images/blogs_images/pic1.jpg') }}"
                                        alt="">
                                </div>
                                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $admin->firstName }}
                                    {{ $admin->lastName }}</h1>
                                <h3 class="text-gray-600 font-lg text-semibold leading-6">
                                    {{ Str::title($admin->designation) }}</h3>
                                <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{ $admin->description }}</p>
                                <ul
                                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                    <li class="flex items-center py-3">
                                        <span>Status</span>
                                        @if ($admin->status == 'active')
                                            <span class="ml-auto"><span
                                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                        @elseif($admin->status == 'inactive')
                                            <span class="ml-auto"><span
                                                    class="bg-red-500 py-1 px-2 rounded text-white text-sm">Inactive</span></span>
                                        @elseif ($admin->status == 'pending')
                                            <span class="ml-auto"><span
                                                    class="bg-yellow-500 py-1 px-2 rounded text-white text-sm">Pending</span></span>>
                                        @endif

                                    </li>
                                    <li class="flex items-center py-3">
                                        <span>Member since</span>
                                        <span class="ml-auto">{{ $admin->created_at->diffForHumans() }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="my-4"></div>

                            <div class="bg-white p-3 hover:shadow">
                                <div></div>
                                <div></div>
                            </div>

                        </div>
                        <!-- Right Side -->
                        <div class="w-full md:w-9/12 mx-2 h-64">

                            <div class="bg-white p-3 shadow-sm rounded-sm">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">About</span>
                                </div>
                                <div class="text-gray-700 mt-2 ">
                                    <div class="grid md:grid-cols-2 text-sm">
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">First Name</div>
                                            <input type="text" id="firstName" name="firstName"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->firstName }}">

                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Last Name</div>
                                            <input type="text" id="lastName" name="lastName"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->lastName }}">

                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Gender</div>
                                            <select id="gender" name="gender" value="{{ old('gender') }}"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                <option selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>

                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Contact No.</div>
                                            <input type="text" id="phone" name="phone"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->phone }}">

                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Current Address</div>
                                            <input type="text" id="phone" name="phone"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->phone }}">
                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                            <input type="text" id="phone" name="phone"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->phone }}">
                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Email.</div>

                                            <input type="email" id="email" name="email"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->email }}">

                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Birthday</div>
                                            <input type="date" id="dob" name="dob"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->dob }}">

                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Current Address</div>
                                            <input type="text" id="currentAddress" name="currentAddress"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->currentAddress }}">

                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Permanent Address</div>
                                            <input type="text" id="permanentAddress" name="permanentAddress"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $admin->permanentAddress }}">
                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Password</div>
                                            <input type="password" id="password" name="password"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="">

                                        </div>
                                        <div class="grid grid-cols-2 mt-1">
                                            <div class="px-4 py-2 font-semibold">Profile Image</div>
                                            <input name="profile" id="profile"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                type="file">
                                        </div>

                                    </div>
                                    <div class="m-2 ">
                                        <div class="px-4 py-2 font-semibold">Description</div>
                                        <textarea id="message" rows="4"
                                            class="block mx-2 my-2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Bio..."></textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- End of about section -->

                            <div class="my-4"></div>

                            <!-- End of profile tab -->
                            <div class="mt-6" style="float:right">
                                <button type="submit"
                                    class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                                    Admin</button>
                            </div>

                    </div>
                </div>
            </form>
    </div>
@endsection
