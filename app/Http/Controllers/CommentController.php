<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $cleanData = request()->validate([
            "body" => ["required","max:250"],
        ]);

         // dd($cleanData);

        $cleanData['user_id'] = auth()->id();
        // $cleanData['blog_id'] = $blog->id;
        // Comment::create($cleanData);
        
        $blog->comments()->create($cleanData); //hasmany query instance obj
        
        return back();
    }
}
