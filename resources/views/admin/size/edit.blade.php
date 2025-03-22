@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Size</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Size Info</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Edit Size From </h3>
                        <a href="{{route('size.index')}}" class="btn btn-primary">All Sizes</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('size.update',$size->id )}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Size Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" value="{{$size->name}}" placeholder="Enter Size Name" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Size Code</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="code" value="{{$size->code}}" placeholder="Enter Size Code" type="color">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Size Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" placeholder="Enter Size Description">{{$size->description}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Size Info</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
