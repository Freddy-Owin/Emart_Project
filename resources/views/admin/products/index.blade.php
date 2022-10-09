@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    @if (session('created'))
    <div class="alert alert-success">
        {{ session('created') }}
    </div>
    @endif

    @if (session('updated'))
    <div class="alert alert-info">
        {{ session('updated') }}
    </div>
    @endif

    @if (session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }}
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h1 class="card-title">Products</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>
                                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-file-circle-plus p-2"></i>Add New Product
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" width="40px" height="30px">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>$ {{ $product->price }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-circle-info p-2"></i>Show Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $products->links() }}
        </ul>
    </nav>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
@stop
