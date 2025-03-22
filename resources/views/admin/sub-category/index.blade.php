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
                    <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">All Sub Category Info</h3>
                        <a href="{{route('sub-category.create')}}" class="btn btn-primary">Add Sub Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sub_category->category_id}}</td>
                                        <td>{{$sub_category->name}}</td>
                                        <td>{{$sub_category->description}}</td>
                                        <td><img src="{{asset($sub_category->image)}}" alt="" height="50"></td>
                                        <td class="d-flex">
                                            <a href="{{route('sub-category.edit',$sub_category->id)}}" class="btn btn-danger me-2">Edit</a>
                                            <form action="{{route('sub-category.destroy',$sub_category->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-warning" onclick="return confirm('Are You sure to Delete this..');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
