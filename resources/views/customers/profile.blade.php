@extends('layouts.customer')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card bg-dark mt-5">
                    <div class="card-header">
                        <h1 class="card-title text-info">Profile</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item bg-dark text-info">Name : {{ auth('customer')->user()->name }}</li>
                            <li class="list-group-item bg-dark text-info">Email : {{ auth('customer')->user()->email }}</li>
                            <li class="list-group-item bg-dark text-info">Phone : {{ auth('customer')->user()->phone }}</li>
                            <li class="list-group-item bg-dark text-info">Address : {{ auth('customer')->user()->address }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="/" class="btn btn-outline-info">Back</a>
                        <a href="{{ route('carts') }}" class="btn btn-outline-info">Carts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


