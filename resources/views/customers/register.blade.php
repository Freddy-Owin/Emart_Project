@extends('layouts.customer')

@section('title')
    Register
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
        <div class="row justify-content-center">
            <div class="col-8 mt-5">
                <h1>Create a New Account</h1>
                <form action="{{ route('customer.register') }}" method="POST">
                    @csrf
                    <div class="row justify-contetn-around mt-5 mb-5">
                        <div class="form-group col-5 mt-5">
                            <label for="name">Name</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control bg-dark text-info">
                        </div>
                        <div class="form-group col-5 mt-5">
                            <label for="email">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" class="form-control bg-dark text-info">
                        </div>
                        <div class="form-group col-5 mt-5">
                            <label for="password">Password</label>
                            <input value="{{ old('password') }}" type="password" name="password" class="form-control bg-dark text-info">
                        </div>
                        <div class="form-group col-5 mt-5">
                            <label for="password_confirmation">Verify Password</label>
                            <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" class="form-control bg-dark text-info">
                        </div>
                        <div class="form-group col-5 mt-5">
                            <label for="phone">Phone</label>
                            <input value="{{ old('phone') }}" type="text" name="phone" class="form-control bg-dark text-info">
                        </div>
                        <div class="form-group col-5 mt-5">
                            <label for="address">Address</label>
                            <textarea name="address" id="" cols="30" rows="3" class="form-control bg-dark text-info"></textarea>
                        </div>
                        <div class="form-group col-5 mt-5">
                            <button class="btn btn-success col-8">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
