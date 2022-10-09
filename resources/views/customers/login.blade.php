@extends('layouts.customer')

@section('title')
    Login
@endsection

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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card bg-transparent mt-5">
                        <div class="card-header">
                            <h1 class="card-title text-dark">Login</h1>
                        </div>
                        <form action="{{ route('customer.login') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('error'))
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif
                                <div class="form-group mt-5">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control text-dark bg-transparent" placeholder="@gmail.com">
                                </div>

                                <div class="form-group mt-5">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control bg-transparent" placeholder="password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-outline-dark">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
