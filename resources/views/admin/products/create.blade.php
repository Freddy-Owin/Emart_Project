@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

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
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header row justify-content-between">
                        <div class="h1 card-title col-10">Create Product</div>
                        <div class="col-2">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                <i class="fa-sharp fa-solid fa-arrow-left p-2"></i>Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row justify-content-around">
                            <div class="form-group col-5">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-5">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                            </div>
                            <div class="form-group col-5">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-5">
                                <label for="brand_id">Brand</label>
                                <select name="brand_id" id="" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-5">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group col-4">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" onchange="previewFile(this)">
                                <img id="previewImg" alt="product image" class="mt-2" width="130px" height="130px">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-success btn-sm">
                                <i class="fa-solid fa-file-circle-plus p-2"></i>Create Now
                            </button>
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
    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@stop
