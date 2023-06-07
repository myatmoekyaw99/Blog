<?php

use App\Http\Controllers\ContactController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
// use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // DB::listen(function($query){
    //     logger($query->sql);
    // });
    return view('blogs',[
        // 'blogs' => Blog::with('category','author')->get()
        'blogs' => Blog::latest()->get(),
        'categories' => Category::all()
    ]);
});
Route::get('/contact',[ContactController::class,'contact']);

// route model binding
Route::get('/blogs/{blog}',function(Blog $blog){
    // $blog = Blog::findOrFail($id); 
    return view('blog',[
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
    ]);
});

// Route::get('/blogs/{blog:slug}',function(Blog $blog){
//     // $blog = Blog::where('slug',$slug)->first(); 
//     return view('blog',[
//         'blog' => $blog
//     ]);
// });

Route::get('/categories/{category:slug}',function(Category $category){
    return view('blogs',[
        'blogs' => $category->blogs,
        // ->load('category','author')
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
});

Route::get('/users/{user}',function(User $user){
    return view('blogs',[
        'blogs' => $user->blogs,
        // ->load('category','author')
        'categories' => Category::all()
    ]);
});