@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Brands</h1>
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
            <div class="col-8">
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>
                                <a href="{{ route('brands.create') }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-plus p-2"></i>Create
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pen p-2"></i>Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash p-2"></i>Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $brands->links() }}
        </ul>
    </nav>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>

@stop
