<x-admin-layout>
    <h1 class="mt-3">Dashboard</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Blog Title</th>
            <th scope="col">Blog Intro</th>
            <th scope="col">Blog Published date</th>
            <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{$blog->title}}</td>
            <td>{{$blog->intro}}</td>
            <td>{{$blog->created_at->format('D-M-Y')}}</td>
            <td>
                <form action="/admin/blogs/{{$blog->id}}/edit" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-warning">Edit</button>
                </form>
            </td>
            <td>
                <form action="/admin/blogs/{{$blog->id}}/delete" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-admin-layout>