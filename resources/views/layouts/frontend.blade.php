<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <div class="navbar bg-dark border-bottom border-success position-fixed top-0" style="height: 70px; width: 100%; z-index:100">
        <div class="container-fluid row justify-content-between w-100 h-75">
            <div class="col-4">
                <h1 class="text-success">
                    <b>Ecommerce</b> Project
                </h1>
            </div>
            <div class="col-4 row justify-content-around">
                <a href="/" class="btn btn-outline-success col-3">
                    <i class="fa-sharp fa-solid fa-house p-1"></i>Home
                </a>
                <div class="dropdown col-3">
                    <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-tags p-1"></i>Brands
                    </a>

                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                        @foreach ($brands as $brand)
                        <li><a class="dropdown-item btn btn-sm btn-outline-success text-success" href="{{ route('brand-select', $brand->id) }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="dropdown col-3">
                    <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-list p-1"></i>Categories
                    </a>

                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item btn btn-sm btn-outline-success text-success" href="{{ route('category-select', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (auth('customer')->check())
            <div class="dropdown col-4 row justify-content-end">
                <a class="btn btn-outline-info col-6 dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user p-1"></i> {{ auth('customer')->user()->name }}
                </a>

                <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">

                    <form action="{{ route('customer.logout') }}" method="POST">
                        @csrf
                        <li>
                            <a class="dropdown-item text-info btn btn-sm" href="{{ route('customer.profile', auth('customer')->user()->id) }}">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-info btn btn-sm" href="{{ route('carts') }}">Carts</a>
                        </li>
                        <li>
                            <button class="dropdown-item text-info btn btn-sm">Logout</button>
                        </li>
                    </form>
                </ul>
            </div>
            @else
            <div class="col-4 row justify-content-around">
                <a href="{{ route('customer.register-view') }}" class="btn btn-outline-info col-4">
                    <i class="fa-solid fa-address-card p-1"></i>Register
                </a>
                <a href="{{ route('customer.login-view') }}" class="btn btn-outline-info col-3">
                    <i class="fa-sharp fa-solid fa-door-open p-1"></i>Login
                </a>
            </div>
            @endif
        </div>
    </div>

    <div style="width: 100%; z-index:0">
        @yield('content')
    </div>

    <script src="https://kit.fontawesome.com/65179477f5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    @yield('script');
</body>
</html>
