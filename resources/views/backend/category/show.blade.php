<x-backend.layouts.master>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        <x-slot:title>
            Category Details
        </x-slot>
    </div>
    <div class="card-body">
        <a href="{{ route('categories.list')}}" class="btn btn-primary">List</a>
        <h2>Name : {{$category->title}}</h2>
        <h4>Description : {{$category->description}}</h4>
    </div>
</div>

</x-backend.layouts.master>

