<x-backend.layouts.master>

    <x-slot:page_title>
        Product
    </x-slot>
<div class="card mb-4">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        <x-slot:title>
            Product Create
        </x-slot>
    </div>
    <div class="card-body"> 
        <a href="{{ route('products.list')}}" class="btn btn-primary">List</a>
        <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" aria-describedby="emailHelp">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category" aria-label="Default select example">
                <option disabled selected>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{old('category', $category->id)}}">{{$category->title}}</option>
                @endforeach
              </select>
              {{-- <input type="text" class="form-control" name="category" id="category" value="{{old('category')}}" aria-describedby="emailHelp"> --}}
            </div>
            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" name="price" id="price" value="{{old('price')}}" aria-describedby="emailHelp">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{old('description')}}</textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3 form-check">
                <label for="file">Image</label>
                <input type="file" name="image" id="file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</x-backend.layouts.master>

