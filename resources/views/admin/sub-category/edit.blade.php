@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Sub Category</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Add Sub Category form</h3>
                        <a href="{{route('sub-category.create')}}" class="btn btn-primary">All Sub Category</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="table-responsive">
                            <form class="form-horizontal" action="{{route('sub-category.update', $sub_category->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$sub_category->id}}">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id" >
                                            <option value=""> -- Select Category -- </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Sub Category Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="name" placeholder="Enter your Category Name" type="text" value="{{$sub_category->name}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Sub Category Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description">{{ $sub_category->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Sub Category Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="image" type="file">
                                        <img src="{{asset($sub_category->image)}}" alt="" style="height: 100px; width: 100px;">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update Sub Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER CLOSED -->
@endsection
