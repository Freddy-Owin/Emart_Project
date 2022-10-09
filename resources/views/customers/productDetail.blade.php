@extends('layouts.frontend')

@section('title')
    Brands
@endsection

@section('content')
    <div class="mt-5 mb-5" style="width: 100%; z-index:-1">
        <div class="row justify-content-center mt-5 w-100">
            <div class="card mt-5 col-8 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mt-5 justify-content-center">
                            <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" class="mt-3 mb-3 col-8">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">Name : {{ $product->name }}</h5>
                            <p class="card-text">Description : {{ $product->description }}</p>
                            <p class="card-text">Price : $ {{ $product->price }}</p>
                        </div>
                        <div class="card-footer">
                            <button onclick="addToCart({{ $product->id }})" href="" class="btn btn-sm btn-outline-success">
                                <i class="fa-solid fa-cart-shopping p-2"></i>Add to Cart
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fa-solid fa-arrow-left p-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>

function addToCart(id) {
    $.ajax({
        url : '/addToCart',
        method: 'POST',
        data: {
            _token: "{{ csrf_token()}}",
            product_id: id
        },
        success: function(data) {
            if(data.success){
                alert('U added to cart')
            } else {
                alert('U already added' );

            }
            // console.log(data);
        },
        error: function(data){
            alert('You need to login!');
        }
    })
}
</script>
@endsection
