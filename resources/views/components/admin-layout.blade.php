<x-layout>
    <div class="container-fluid">
        <div class="row " style="height: 100vh;" >
            <div class="col-md-2" style="background-color: #013;">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mt-3" href="/admin" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                    <a class="nav-link active mt-1" href="/admin/blogs/create">Create Blog</a>
                </div>
            </div>
            <div class="col-md-9 mx-auto">
                    {{$slot}}
            </div>
        </div>
    </div>
</x-layout>