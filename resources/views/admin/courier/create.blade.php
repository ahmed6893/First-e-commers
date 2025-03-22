@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Data Tables</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Add Courier form</h3>
                        <a href="{{route('courier.index')}}" class="btn btn-primary">All Courier Company's</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('courier.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Courier Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" placeholder="Enter your Courier Name" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Courier Company's Logo</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="image" type="file">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Create New Courier</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
