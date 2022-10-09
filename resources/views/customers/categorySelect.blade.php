@extends('layouts.frontend')

@section('title')
    Categories
@endsection

@section('content')
<div class="mt-5 mb-5" style="width: 100%; z-index:-1">
    <div class="row w-100">
        <div class="col-3 position-fixed bg-dark border-end border-info" style="height: 1000px;">
            <h3 class="mt-5 text-center">
                <a href="{{ route('categories-view') }}" class="text-success mt-5 text-decoration-none text-center">Brands</a>
            </h3>
            @foreach ($categories as $list)
            <ul class="list-group list-group-flush text-center">
                <a href="{{ route('category-select', $list->id) }}" class="list-group-item list-group-item-action bg-dark text-decoration-none text-success">{{ $list->name }}</a>
            </ul>
            @endforeach
        </div>
        <div class=" d-flex justify-content-end">
            <div class="col-9 h-100 row justify-content-around">
                @foreach ($products as $product)
                @if ($category->id == $product->category->id)
                hello
                <div class="card m-5 col-4">
                    <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" class="mt-3 mb-3" width="200px" height="180px">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $product->name }}</li>
                            <li class="list-group-item">$ {{ $product->price }}</li>
                            <li class="list-group-item">Brand : {{ $product->brand->name }}</li>

                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('product-detail', $product->id) }}" class="btn btn-sm btn-outline-dark">
                            <i class="fa-solid fa-circle-info p-2"></i>Show Detail
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
