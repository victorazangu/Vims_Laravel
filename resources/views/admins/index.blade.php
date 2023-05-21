@extends('layouts.app')
@section('page')
Admins
@endsection

@section('search-button')
<div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
    <div>

    </div>
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <input type="text" id="table-search-users" id='searchInput' onkeyup='searchTable()' class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for admins">
    </div>
</div>
@endsection
@section('add-button')
<a href="{{ route('register') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Add
    Admin</a>
@endsection

@section('content')
<div>
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <ul role="list" class="divide-y divide-gray-100" id='searchableTable'>

        @foreach ($admins as $admin)
        <div class="data">
            <a href="{{ route('admin_show',$admin) }}">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ $admin->profile }}" alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                {{ Str::title($admin->firstName) }}
                                {{ Str::title($admin->lastName) }}
                            </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $admin->email }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Phone: {{ Str::title($admin->phone) }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500">
                            @if ($admin->status == 'active')
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Active</span>
                            @elseif($admin->status == 'inactive')
                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Inactive</span>
                            @elseif ($admin->status == 'pending')
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Pendind</span>
                            @endif
                        </p>
                    </div>
                    <div class=" sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">{{ Str::title($admin->designation) }} at VIMS</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500">Created
                            {{ $admin->created_at->diffForHumans() }}</time>
                        </p>
                    </div>
                    <div class=" sm:flex sm:flex-col sm:items-end">
                        <form action="{{ route('admin_delete',$admin) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>

                    </div>
                </li>
            </a>
        </div>
        @endforeach

    </ul>

    <div class="sticky bottom-0 inset-x-0 z-10 py-2 bg-white flex justify-center items-center float-right">
        {{ $admins->links() }}
    </div>


    <script>
        // function searchTable() {
        //     var input, filter, table,data, li, i;
        //     input = document.getElementById("searchInput");
        //     filter = input.value.toUpperCase();
        //     table = document.getElementById("searchableTable");
        //     data = table.getElementsByClassName("data");

        //     for (i = 0; i < data.length; i++) {
        //         li = data[i].getElementsByTagName("li");
        //         for (j = 0; j < li.length; j++) {
        //             if (li[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
        //                 found = true;
        //             }
        //         }
        //         if (found) {
        //             data[i].style.display = "";
        //             found = false;
        //         } else {
        //             data[i].style.display = "none";
        //         }
        //     }
        // }
    </script>
    @endsection