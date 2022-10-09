@extends('layouts.frontend')

@section('title')
    Categories
@endsection

@section('content')
    <div class="mt-5 mb-5" style="width: 100%; z-index:-1">
        <div class="row w-100">
            <div class="col-3 position-fixed bg-dark border-end border-info" style="height: 1000px;">
                <h3 class="mt-5 text-center">
                    <a href="{{ route('categories-view') }}" class="text-success text-decoration-none">Categories</a>
                </h3>
                @foreach ($categories as $category)
                <ul class="list-group list-group-flush text-center">
                    <a href="{{ route('category-select',$category->id) }}" class="list-group-item list-group-item-action bg-dark text-decoration-none text-success">{{ $category->name }}</a>
                </ul>
                @endforeach
            </div>
            <div class=" d-flex justify-content-end">
                <div class="col-8 h-100 row justify-content-around">
                    @foreach ($products as $product)
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
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection
