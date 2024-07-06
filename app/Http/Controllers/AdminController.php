<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'blogs' => Blog::latest()->paginate(10)
        ]);
    }

    public function create(Blog $blog){
        return view('admin.create',[
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function store(){
        request()->validate([
            'photo' => ['nullable','image'],
            'title'=> ['required'],
            'slug'=> ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $blog = new Blog();
        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->photo = '/' . request('photo')->store('/blogs', "public");

        $blog->save();
        return redirect('/admin');
        
    }

    public function edit(Blog $blog)
    {
        return view('admin.edit', [
            'categories' => Category::all(),
            'blog' => $blog
        ]);
    }
    
    public function update(Blog $blog)
    {

        request()->validate([
            'title' => ['required'],
            'photo' => ['nullable', 'image'],
            'slug' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        if (request('photo')) {
            //remove old photo
            $path = public_path('storage' . $blog->photo);
            if ($blog->photo && File::exists($path)) {
                File::delete($path);
            }
            //upload new photo
            $blog->photo = '/' . request('photo')->store('/blogs', "public");
        }
        $blog->update();
        return redirect('/admin');
    }
    public function destroy(Blog $blog)
    {
        $path = public_path('storage' . $blog->photo);
        if ($blog->photo && File::exists($path)) {
            File::delete($path);
        }
        $blog->delete();
        return back();
    }
}
