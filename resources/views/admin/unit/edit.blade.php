@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Unit</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Unit</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Edit Unit form</h3>
                        <a href="{{route('unit.index')}}" class="btn btn-primary">All Unit</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('unit.update',$unit->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Unit Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" value="{{$unit->name}}" placeholder="Enter Unit Name" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Unit Code</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="code" value="{{$unit->code}}" placeholder="Enter Unit Code" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Unit Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" placeholder="Enter Unit Description">{{$unit->description}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Unit info</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
