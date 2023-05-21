@extends('layouts.app')
@section('page')
Blogs
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
        <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for blog">
    </div>
</div>
@endsection
@section('add-button')
<a href="{{ route('blogs_create') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Add
    Blog</a>
@endsection

@section('content')
<!-- <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        @foreach ($categories as $category)
            <li class="mr-2">
                <a href="{{ route('blogs', ['category' => $category->id]) }}"
                    class="inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active"
                    aria-current="page">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul> -->


<div class="container mx-auto flex flex-wrap py-6">

    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @forelse($blogs as $blog)
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="{{ route('blog_show', $blog) }}" class="hover:opacity-75">
                <img src="{{ asset($blog->imagePath) }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category->name }}</a>
                <a href="{{ route('blog_show', $blog) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</a>
                <p href="{{ route('blog_show', $blog) }}" class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{ $blog->user->firstName }} {{ $blog->user->lastName }}</a>,
                    Published on
                    {{ $blog->created_at->diffForHumans() }}
                </p>
                <a href="{{ route('blog_show', $blog) }}" class="pb-6">{{ $blog->description }}...</a>
                <a href="{{ route('blog_show', $blog) }}" class="uppercase text-gray-800 hover:text-black">Continue
                    Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article>
        @empty
        <p>Sorry, currently there is no blog post!</p>
        @endforelse

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
        <p class="text-xl font-semibold pb-2">Related Blogs</p>
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            @forelse($relatedPosts as $related)
            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ asset($related->imagePath) }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $related->category->name }}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $related->title }}</a>
                    <p href="#" class="text-sm pb-8">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $related->user->firstName }}
                            {{ $related->user->lastName }}</a>, Published on
                        {{ $related->created_at->diffForHumans() }}
                    </p>

                </div>
            </article>
            @empty
            <p>No related blogs</p>
            @endforelse

    </aside>
    <div class="sticky bottom-0 inset-x-0 z-10 py-2 bg-white flex justify-center items-center float-right">
        {{ $blogs->links() }}
    </div>

</div>
@endsection