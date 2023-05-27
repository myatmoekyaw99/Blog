<x-layout>
    <x-slot name="title">{{$blog->title}}</x-slot>
    <div>
       <h1><?= $blog->title; ?></h1>
        <p>{{$blog->body}}</p>
    </div>   
</x-layout>
   
