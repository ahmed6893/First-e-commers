@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Category</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Edit Category form</h3>
                        <a href="{{route('category.index')}}" class="btn btn-primary">All Category</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="table-responsive">
                            <form class="form-horizontal" action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$category->name}}" name="name" placeholder="Enter your Category Name" type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="image" type="file">
                                        <img src="{{asset($category->image)}}" height="50">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update Category info</button>
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
