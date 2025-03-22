@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">User Module</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">User </a></li>
                    <li class="breadcrumb-item active" aria-current="page">All New User</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Add New User </h3>
                        <a href="{{route('user.index')}}" class="btn btn-primary">All User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <form class="form-horizontal" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">User Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="name" placeholder="User Name" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">User Email</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="email" placeholder="User Email" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">User Password</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="password" placeholder="User password" type="password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">User Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Create New User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
