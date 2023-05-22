<?php

use App\Http\Controllers\ContactController;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
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
    $blogs = Blog::all();
    return view('blogs',[
        'blogs' => $blogs
    ]);
});
Route::get('/contact',[ContactController::class,'contact']);
Route::get('/blogs/{id}',function($id){
    $findBlog = Blog::find($id);
    return view('blogs',[
        'blogs' => $findBlog
    ]);
});