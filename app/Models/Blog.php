<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog{

    public $title;
    public $body;
    public $id;
    
    public function __construct($title, $body, $id){
        $this->title = $title;
        $this->body = $body;
        $this->id = $id;
    }
    public static function all(){
        // dd(resource_path('blogs'));
        $path = resource_path('blogs');
        // dd($path);
        $blogs = File::files($path);
        $blogs = collect($blogs);
        // collection
        $blogs = $blogs->map(function($blog){
            // var_dump($blog);
            $filename = basename($blog);
            $path = resource_path('blogs/').$filename;
            $yamlObj = YamlFrontMatter::parseFile($path);
            // echo "<pre>";
            $title = $yamlObj->title;
            $body = $yamlObj->body();
            $id = $yamlObj->id;
            // dd($id);
            return new Blog($title,$body,$id);
        })->sortByDesc('id');
        // dd($blogs);
        return $blogs;
    }
    public static function find($id){
        $foundBlogs = static::all()->where('id','=',$id)->first();
        // dd($foundBlogs);
        return $foundBlogs;
    }

    public static function findOrFail($id){

        $blogs = static::find($id);
        if(!$blogs){
            abort(404);
        }
        // dd($blogs);
        return $blogs;
    }
}