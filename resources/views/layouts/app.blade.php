<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-store') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="d-flex min-vh-100">
        <!-- Sidebar -->

        @if(Auth::user()->role == 'admin')
        <div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <div class="row">
                <div class="col-5 p-0 order-2" style="font-size: x-large;font-weight:bolder">E-store</div>
                <div class="col-4 p-0 order-1"><img src="{{asset('favicon.ico')}}" alt="" width="50px" class="text-center"></div>
            </div>

            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="{{route('admin.dashboard')}}" class="text-white d-block py-2">Dashboard</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="{{route('admin.users')}}" class="text-white d-block py-2"> Users</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"><a href="{{route('admin.products.category')}}" class="text-white d-block py-2">products Category</a></div>
                <div class="col-2 mt-5px order-1"><i class='fas fa-box-open' style='font-size:48px;color:white'></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"><a href="{{route('admin.products')}}" class="text-white d-block py-2">products</a></div>
                <div class="col-2 mt-5px order-1"><i class='fas fa-box-open' style='font-size:48px;color:white'></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="{{route('profile.edit')}}" class="text-white d-block py-2"> Profile</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white">box</i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2"> Settings</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2"> Log Out</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            </ul>
        </div>
        @endif

        @if(Auth::user()->role == 'user')
        <div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <div class="row">
                <div class="col-5 p-0 order-2" style="font-size: x-large;font-weight:bolder">E-store</div>
                <div class="col-4 p-0 order-1"><img src="{{asset('favicon.ico')}}" alt="" width="50px" class="text-center"></div>
            </div>

            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="{{route('user.dashboard')}}" class="text-white d-block py-2"> Dashboard</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-8 mt-5px order-2"> <a href="{{route('user.products')}}" class="text-white d-block py-2">Total Products</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-7 mt-5px order-2"> <a href="" class="text-white d-block py-2">Total Orders</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-7 mt-5px order-2"> <a href="" class="text-white d-block py-2">Total sales</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-7 mt-5px order-2"> <a href="" class="text-white d-block py-2">Earnings</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="{{route('profile.edit')}}" class="text-white d-block py-2"> Profile</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white">box</i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2"> Settings</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            <div class="row">
                <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2"> Log Out</a></div>
                <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
            </div>
            </ul>
        </div>
        @endif

        <!-- Main Content -->
        <div class="flex-grow-1">
            <div class="min-h-screen bg-gray-100">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

    </div>

</body>

</html>

<footer class="bg-white shadow">
    <div class="text-center p-3 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        © 2020 Copyright:
        <a class="text-body" href="">MDBootstrap.com</a>
    </div>
</footer>

<!-- Add SweetAlert2 CDN
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>