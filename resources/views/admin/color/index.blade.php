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
                    <li class="breadcrumb-item active" aria-current="page">Manage Color</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">All Color Info</h3>
                        <a href="{{route('color.create')}}" class="btn btn-primary">Add New Color</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $color)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>{{$color->code}}</td>
                                        <td>{{$color->description}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('color.edit',$color->id)}}" class="btn btn-danger me-2">Edit</a>
                                            <form action="{{route('color.destroy',$color->id)}}" method="post">
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
