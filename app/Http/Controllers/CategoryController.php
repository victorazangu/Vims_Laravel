<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            
        ]);
     
        Category::create([
            'name' => $request->name,

        ]);
        return redirect()->route('blogs_create')->with('success', 'Category created successfully');
    }
}
