@extends('admin.master')
@section('body')

    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Cloud</h1>
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
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Edit Clouds</h3>
                                <a href="{{'cloud.index'}}" class="btn btn-primary">All Clouds</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form class="form-horizontal" action="{{route('cloud.update')}}" method="post" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">Cloud Name</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="name" type="text" placeholder="Enter Your Cloud Name">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label">Cloud Image</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="image" type="file">
                                                <img src="{{asset()}}" height="50">
                                            </div>
                                        </div>
                                        <button class="btn btn-warning" type="submit">Update Cloud Info</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->

            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

@endsection
