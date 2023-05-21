<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'imagePath' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $category_id = $request->input('category_id');

        if (Blog::latest()->first() !== null) {
            $postId = Blog::latest()->first()->id + 1;
        } else {
            $postId = 1;
        }

        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');

        //File upload
        $imagePath = 'storage/' . $request->file('imagePath')->store('postsImages', 'public');

        $post = new Blog();
        $post->title = $title;
        $post->description = $description;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;

        $post->save();

        return redirect(route('blogs'))->with('status', 'Blog Created Successfully');
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
