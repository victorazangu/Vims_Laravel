<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $blogs = Blog::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(3);
        } elseif ($request->category) {
            $category = Category::where('name', $request->category)->firstOrFail();
            $blogs = $category->posts()->paginate(3)->withQueryString();
            $blog = $category->posts()->where('slug', $request->blog)->firstOrFail();
        } else {
            $blogs = Blog::latest()->paginate(3);
        }

        $categories = Category::all();

        if (isset($category)) {
            $relatedPosts = $category->posts()->where('id', '!=', $blog->id)->latest()->take(2)->get();
        } else {
            $relatedPosts = collect();
        }

        return view('blogs.index', compact('blogs', 'categories', 'relatedPosts'));
    }


    public function show(Blog $blog)
    {
        $category = $blog->category;
        $previous = Blog::where('created_at', '<', $blog->created_at)->orderBy('created_at', 'desc')->first();
        $next = Blog::where('created_at', '>', $blog->created_at)->orderBy('created_at', 'asc')->first();
        $relatedPosts = $category->posts()->where('id', '!=', $blog->id)->latest()->take(2)->get();
        return view('blogs.show', compact('blog', 'relatedPosts', 'previous', 'next'));
    }
}
