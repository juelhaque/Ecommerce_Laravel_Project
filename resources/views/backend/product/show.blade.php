<x-backend.layouts.master>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        <x-slot:title>
            Product Details
        </x-slot>
    </div>
    <div class="card-body">
        <a href="{{ route('products.list')}}" class="btn btn-primary">List</a>
        <h2>Name : {{$product->title}}</h2>
        <h2>Price : {{$product->price}}</h2>
        <h4>Description : {{$product->description}}</h4>
        <h4>Image : <img src="{{ asset('storage/products/'.$product->image)}}" alt="" height="auto" width="400"></h4>
    </div>
</div>

</x-backend.layouts.master>

