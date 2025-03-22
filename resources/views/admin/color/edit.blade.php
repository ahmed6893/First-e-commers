@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Color</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Color Info</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Edit Color From </h3>
                        <a href="{{route('color.index')}}" class="btn btn-primary">All Colors</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('color.update',$color->id )}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Color Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" value="{{$color->name}}" placeholder="Enter Color Name" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Color Code</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="code" value="{{$color->code}}" placeholder="Enter Color Code" type="color">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Color Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" placeholder="Enter Color Description">{{$color->description}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Color Info</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
