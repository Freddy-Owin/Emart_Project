@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row jusitfy-content-center">
            <div class="col-12">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Total Amount</th>
                            <th>Grand Total</th>
                            <th>Total Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>{{ $order->total_quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
@stop

