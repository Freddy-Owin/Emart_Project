@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Brand Edit</h1>
@stop

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mt-5">
                    <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                            </div>
                        </div>
                        <div class="card-footer row justify-content-between">
                            <button class="btn btn-sm btn-outline-info">
                                <i class="fa-solid fa-wrench p-2"></i>Update
                            </button>
                            <a href="{{ route('brands.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-arrow-left p-2"></i>Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>

@stop
