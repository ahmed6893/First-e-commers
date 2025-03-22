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
                    <form action="{{route('customer.update',['id'=> $customer->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-body">
                            <h1 class="text-center">My Profile</h1>
                            <hr/>
                            <div class="row mb-3">
                                <label class="col-md-3">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$customer->name}}" name="name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" value="{{$customer->email}}" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="{{$customer->mobile}}" name="mobile">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Date of Birth</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" value="{{$customer->date_of_birth}}" name="date_of_birth">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Blood Group</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$customer->blood_group}}" name="blood_group">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <select class="form-control" name="blood_group">
                                        <option value="">-- Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A+">A+</option>
                                        <option value="A+">A+</option>
                                        <option value="A+">A+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" value="{{$customer->image}}" name="image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">NID</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$customer->nid}}" name="nid">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Address</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="address">{{$customer->address}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success" value="Update Information">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
