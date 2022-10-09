@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card mt-3">
                    <div class="row justify-content-center">
                            <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" class="mt-2 col-5" width="300px" height="280px">
                    </div>
                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $product->name }}</li>
                            <li class="list-group-item">{{ $product->description }}</li>
                            <li class="list-group-item">Price : $ {{ $product->price }}</li>
                            <li class="list-group-item">Category : {{ $product->category->name }}</li>
                            <li class="list-group-item">Brand : {{ $product->brand->name }}</li>
                        </ul>
                    </div>
                    <div class="card-footer row justify-content-between">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="col-10">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-pen p-2"></i>Edit Product
                            </a>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash p-2"></i> Delete Product
                            </button>
                        </form>

                        <div class="col-2">
                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">
                                <i class="fa-sharp fa-solid fa-arrow-left p-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
@stop
