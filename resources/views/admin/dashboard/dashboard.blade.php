@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-around">
            <a href="{{ route('products.index') }}" class="info-box col-3 m-3 text-dark">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-fw fa-brands fa-shopify"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number">{{ $products->count() }}</span>
                </div>
            </a>
            <a href="{{ route('categories.index') }}" class="info-box  m-3 col-3 text-dark">
                <span class="info-box-icon bg-danger">
                    <i class="fas fa-list"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Categories</span>
                    <span class="info-box-number">{{ $categories->count() }}</span>
                </div>
            </a>
            <a href="{{ route('brands.index') }}" class="info-box m-3 col-3 text-dark">
                <span class="info-box-icon bg-gradient-warning">
                    <i class="fas fa-tags"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Brands</span>
                    <span class="info-box-number">{{ $brands->count() }}</span>
                </div>
            </a>

            <a class="info-box m-3 col-3 text-dark">
                <span class="info-box-icon bg-gradient-navy">
                    <i class="fas fa-user"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Customers</span>
                    <span class="info-box-number">{{ $customers->count() }}</span>
                </div>
            </a>



        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
@stop
