@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ asset($blog->imagePath) }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category->name }}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</a>
                    <p href="#" class="text-sm pb-8">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $blog->user->firstName }}
                            {{ $blog->user->lastName }}</a>, Published on {{ $blog->created_at->toDayDateTimeString() }}
                    </p>

                    {{ $blog->body }}
                </div>
            </article>

            <div class="w-full flex pt-6">
                @if ($previous)
                    <a href="{{ route('blog_show', $previous->id) }}"
                        class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                            Previous</p>
                        <p class="pt-2">{{ $previous->title }}</p>
                    </a>
                @endif
                @if ($next)
                    <a href="{{ route('blog_show', $next->id) }}"
                        class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                                class="fas fa-arrow-right pl-1"></i></p>
                        <p class="pt-2">{{ $next->title }}</p>
                    </a>
                @endif
            </div>

            <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
                <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                    <img src="{{ asset($blog->user->profile) }}" class="rounded-full shadow h-32 w-32">
                </div>
                <div class="flex-1 flex flex-col justify-center md:justify-start">
                    <p class="font-semibold text-2xl">{{ $blog->user->firstName }}</p>
                    <p class="pt-2">{{ $blog->user->description }}</p>
                    <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                        <a class="" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

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
                            <a href="#"
                                class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $related->category->name }}</a>
                            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $related->title }}</a>
                            <p href="#" class="text-sm pb-8">
                                By <a href="#"
                                    class="font-semibold hover:text-gray-800">{{ $related->user->firstName }}
                                    {{ $related->user->lastName }}</a>, Published on
                                {{ $related->created_at->diffForHumans() }}
                            </p>

                        </div>
                    </article>
                @empty
                    <p>No related blogs</p>
                @endforelse

        </aside>

    </div>
@endsection
