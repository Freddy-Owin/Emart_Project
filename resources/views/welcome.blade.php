@extends('layouts.frontend')

@section('title')
    Ecommerce
@endsection

@section('content')
    <div>
        <div class="row mt-5 justify-content-center bg-dark" style="height: 500px">
            <div class="col-8 h-100">
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="{{ asset('storage/sliders/1663657442_slider1.jpg') }}" class="d-block w-100" height="100%" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/sliders/1663657601_slider4.jpeg') }}" class="d-block w-100 h-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/sliders/1663657790_slider5.jpg') }}" class="d-block w-100 h-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            @if (auth('customer')->check())
            <div class="text-success col-4 row justify-content-center">
                <div class="col-8">
                    <div class="header mt-5">
                        <h3>Welcome Back {{ auth('customer')->user()->name }}</h3>
                    </div>
                    <div class="login mt-5">
                        <p class="text-success">
                            Search with Brands
                        </p>
                        <a href="{{ route('brands-view') }}" class="btn btn-outline-success">
                            <i class="fas fa-tags p-1"></i>Brands
                        </a>
                    </div>
                    <div class="login mt-5">
                        <p class="text-success">
                            Search with Categories!
                        </p>
                        <a href="{{ route('categories-view') }}" class="btn btn-outline-success">
                            <i class="fas fa-list p-1"></i>Categories
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="text-success col-4 row justify-content-center">
                <div class="col-8">
                    <div class="header mt-5">
                        <h1>Welcome to Our Website</h1>
                    </div>
                    <div class="login mt-5">
                        <p class="text-info">Login to Your Account</p>
                        <a href="{{ route('customer.login') }}" class="btn btn-outline-info">
                            <i class="fa-sharp fa-solid fa-door-open p-1"></i>Login
                        </a>
                    </div>
                    <div class="login mt-5">
                        <p class="text-info">
                            If you don't have an account, register here!
                        </p>
                        <a href="{{ route('customer.register') }}" class="btn btn-outline-info">
                            <i class="fa-solid fa-address-card p-1"></i>Register
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="container">
        <h3 class="text-center mt-5">Latest Products</h3>
        <div class="row justify-content-around">
            @foreach ($products as $product)
            <div class="card m-5 col-3">
                <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" class="mt-3 mb-3" width="200px" height="180px">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $product->name }}</li>
                        <li class="list-group-item">$ {{ $product->price }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('product-detail', $product->id) }}" class="btn btn-outline-dark btn-sm">
                        <i class="fas fa-circle-info p-2"></i>Show Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
