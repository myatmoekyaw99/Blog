<x-layout>
<x-slot name="title">Home</x-slot>
    @foreach($blogs as $blog)
    <div>
        <a href="/blogs/{{$blog->id}}"><h1 class="{{ $loop->first ? 'bg-red' : ''}}">{{$blog->title}}</h1></a>
        <p>{!!$blog->body!!}</p>
    </div>   
    @endforeach
</x-layout>
   