<x-admin-layout>
    <h1 class="mt-2">Create Blog Form</h1>
        <form action="/admin/blogs/store" method="POST" >
            @csrf
            <div class="form-group my-3">
                <label for="exampleFormControlInput1">Blog Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}" id="exampleFormControlInput1" placeholder="Enter blog title">
            </div>
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            
            <div class="form-group my-3">
                <label for="exampleFormControlInput2">Blog Slug</label>
                <input type="text" name="slug" class="form-control" value="{{old('slug')}}" id="exampleFormControlInput2" placeholder="Enter blog slug">
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group my-3">
                <label for="exampleFormControlInput3">Blog Intro</label>
                <input type="text" name="intro" class="form-control" value="{{old('intro')}}" id="exampleFormControlInput3" placeholder="Enter blog intro">
            @error('intro')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            
            <div class="form-group my-3">
            <label for="select">Blog Category</label>
                <select name="category_id" class="form-select" id="select" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group my-3">
                <label for="exampleFormControlTextarea4">Blog Body</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea4" rows="5">{{old('body')}}</textarea>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" id="exampleFormControlInput5" value="Create">
            </div>
        </form>
</x-admin-layout>