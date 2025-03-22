@extends('website.master')
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-body">
                        <div class="list-group">
                            <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.dashboard' ? 'active' : ''}}">
                               Dashboard
                            </a>
                            <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.profile' ? 'active' : ''}}">Profile</a>
                            <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.order' ? 'active' : ''}}">My Order</a>
                            <a href="#" class="list-group-item list-group-item-action">Change Password</a>
                            <a class="list-group-item list-group-item-action disabled">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card card-body">
                        <h1>My Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
