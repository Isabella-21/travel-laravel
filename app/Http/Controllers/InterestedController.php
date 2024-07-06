<?php

namespace App\Http\Controllers;


use App\Models\Blog;


class InterestedController extends Controller
{
    public function toggle(Blog $blog){
        if (!auth()->user()->isInterested($blog)){
            $blog->users()->attach(auth()->id());
        }else{
            $blog->users()->detach(auth()->id());
        }
        return back();
    }
}


