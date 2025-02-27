<!-- @extends('layouts.app') -->

<div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
    <div class="row">
        <div class="col-5 p-0 order-2" style="font-size: x-large;font-weight:bolder">E-store</div>
        <div class="col-4 p-0 order-1"><img src="{{asset('favicon.ico')}}" alt="" width="50px" class="text-center"></div>
    </div>

    <div class="row">
        <div class="col-5 mt-5px order-2"> <a href="{{route('admin.dashboard')}}" class="text-white d-block py-2"> Dashboard</a></div>
        <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
    </div>
    <div class="row">
        <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2">Your Products</a></div>
        <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
    </div>
    <div class="row">
        <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2">Orders</a></div>
        <div class="col-2 mt-5px order-1"><i class="material-icons" style="font-size:25px;color:white"></i></div>
    </div>
    <div class="row">
        <div class="col-5 mt-5px order-2"> <a href="" class="text-white d-block py-2">Cart</a></div>
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