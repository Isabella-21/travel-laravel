<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()
            ->filter(request(['query','category_id']))
            ->paginate(10),
            'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog) //Blog::find(2)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }
}
