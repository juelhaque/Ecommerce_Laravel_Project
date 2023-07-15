<x-backend.layouts.master>

    <x-slot:page_title>
        Category
    </x-slot>
<div class="card mb-4">
    <div class="card-header">

        @if(session('message'))

            {{-- @isset($_SERVER)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endisset

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> --}}

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <i class="fas fa-table me-1"></i>
        <x-slot:title>
            Category List
        </x-slot>
    </div>

        <form class="d-flex my-2 mx-2" action="" method="get">
        @csrf
        <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

    <div class="card-body">
    @can('create-category')
        <a href="{{route('categories.create') }}" class="btn btn-primary">Create</a>
    @endcan
        <a href="{{route('categories.pdf') }}" class="btn btn-primary">PDF Download</a>
        <a href="{{route('categories.excel') }}" class="btn btn-primary">Excel Download</a><br>
            <hr>
            {{-- <form action="{{route('categories.impexcel')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-check">
                    <label for="file">Excel</label>
                    <input type="file" name="image" id="file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> --}}
            <form action="{{ route('categories.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Excel Sheet</button>
                {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
            </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $categories->firstItem()+$loop->index}}</td>
                    <td>{{ $category->title}}</td>
                    <td>{{ $category->description}}</td>
                    <td class="d-flex me-1">
                        <a href="{{ route('categories.show', ['category'=>$category->id])}}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('categories.edit', ['category'=>$category->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <form style="display: inline" action="{{route('categories.destroy', ['category'=>$category->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <button onclick="alert('Are you sure?')" class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>

</x-backend.layouts.master>

