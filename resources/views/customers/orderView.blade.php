@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card text-info bg-dark mt-3 mb-3">
                    <div class="card-body">
                        <table class="bg-dark text-info table border-info table-bordered">
                            <tr>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Price</td>
                            </tr>
                            @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->name }}</td>
                                <td>{{ $cart->pivot->quantity }}</td>
                                <td>$ {{ $cart->price * $cart->pivot->quantity}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Total</td>
                                <td>{{ $quantities }}</td>
                                <td>$ {{ $total }}</td>
                            </tr>
                        </table>

                        <form action="{{ route('order') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_phone">Phone Number</label>
                                <input type="text" name="customer_phone" class="bg-dark border-info text-info form-control">
                                @if ($errors->has('customer_phone'))
                                    <span class="invalid feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('customer_phone') }}.</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="customer_address">Address</label>
                                <textarea name="customer_address" id="" cols="30" rows="3" class="bg-dark border-info text-info form-control"></textarea>
                                @if ($errors->has('customer_phone'))
                                    <span class="invalid feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('customer_phone') }}.</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mt-3 form-group">
                                <button class="btn btn-outline-info">
                                    <i class="fa-brands fa-shopify p-2"></i>Order Now
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-info">
                                    <i class="fa-solid fa-arrow-left p-2"></i>Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

