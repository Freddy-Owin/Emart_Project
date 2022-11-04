@extends('layouts.customer')

@section('title')
    Profile
@endsection

@section('content')

    @if (session('deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- {{ dd($products) }} --}}
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card bg-dark mt-3">
                    <div class="card-header">
                        <h1 class="card-title text-info">Your Carts</h1>
                    </div>
                    <div class="card-body">
                        <table class="table text-info table-bordered border-info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" width="50px" height="40px">
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        $ {{ $product->price }}
                                    </td>
                                    <td>
                                        {{ $product->pivot->quantity }}
                                    </td>
                                    <td>
                                        $ {{ $product->price * $product->pivot->quantity }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cart-delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash p-1"></i>remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>
                                        {{ $quantities }}
                                    </td>
                                    <td>
                                        $ {{ $total }}
                                    </td>
                                    <td>
                                        <a href="{{ route('order-view') }}" class="btn btn-outline-info btn-sm">Order Now</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="/" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


