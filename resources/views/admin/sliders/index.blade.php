@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
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

    <h1>
        <a href="{{ route('sliders.create') }}" class="btn btn-success">
            <i class="fa-solid fa-folder-plus p-2"></i>Create a New Slider
        </a>
    </h1>
@stop

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-around">
            @foreach($sliders as $slider)
            <div class="card col-3">
                <img src="{{ asset('storage/sliders') }}/{{ $slider->image }}" alt="{{ $slider->header }}" width="250px" height="220px">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Header : {{ $slider->header }}</li>
                        <li class="list-group-item">Header : {{ $slider->paragraph }}</li>

                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@stop
