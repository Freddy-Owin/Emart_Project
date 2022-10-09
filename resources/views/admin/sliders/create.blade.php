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
            <div class="col-8">
                <div class="card bg-transparent mt-3">
                    <div class="card-header row.justify-content-between">
                        <h1 class="card-title col-9">Submit a New Slider</h1>
                        <a href="{{ route('sliders.index') }}" class="btn btn-info col-2">
                            <i class="fa-solid fa-arrow-left p-2"></i>Back
                        </a>
                    </div>
                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="header">Slider Header</label>
                                <input type="text" class="form-control bg-transparent" name="header" class="form-group" value="{{ old('header') }}">
                            </div>
                            <div class="form-group">
                                <label for="header">Slider Paragraph</label>
                                <input type="text" class="form-control bg-transparent" name="paragraph" class="form-group" value="{{ old('paragraph') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Slider Image</label>
                                <input type="file" class="form-control bg-transparent" name="image" class="form-group" onchange="previewFile(this)">
                                <img alt="Slider Image" id="previewImg" class="mt-2" width="130px" height="130px">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">
                                <i class="fa-solid fa-folder-plus p-2"></i>Add a New Slider
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
