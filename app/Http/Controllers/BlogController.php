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
            $blogs = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        } else {
            $blogs = Blog::latest()->paginate(3);
        }
        $categories = Category::all();
        return view('blogs.index', compact('blogs', 'categories'));
    }


    public function show(Blog $blog)
    {
        $category = $blog->category;

        $relatedPosts = $category->posts()->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
