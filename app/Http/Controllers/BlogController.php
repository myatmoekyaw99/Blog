<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index() {
        // DB::listen(function($query){
        //     logger($query->sql);
        // });
        return view('blogs',[
            // 'blogs' => Blog::with('category','author')->get()
            'blogs' => Blog::latest()->filter(request(['search','category','author']))->paginate(3),
            'categories' => Category::all()
        ]);
    }

     // function getBlogs(){
    //     $blogs=Blog::latest();
    //     if($search=request('search')){
    //        $blogs->where('title','LIKE','%'.$search."%");
    //     }
    //     return $blogs->get();
    // }

    public function show(Blog $blog){
        // $blog = Blog::findOrFail($id); 
        return view('blog',[
            'blog' => $blog->load('comments'),
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),
            // 'comments' => Comment::all(),
        ]);
    }
}
