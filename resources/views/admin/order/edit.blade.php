@extends('admin.master')
@section('body')
    <!--app-content open-->
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Order</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Edit</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Order Edit</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <form class="form-horizontal" action="{{route('order.update', $order->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Order Total</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$order->order_total}}" readonly type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Customer Info</label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{$order->customer->name.'('.$order->customer->mobile.')'}}" readonly type="text">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Delivery Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="delivery_address" type="file">{{$order->delivery_address}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Select Courier</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name='courier_id'>
                                            @foreach($couriers as $courier)
                                            <option value="{{$courier->id}}" @selected($order->courier_id == $courier->id)>
                                                {{$courier->name}}
                                            </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Order Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name='order_status'>
                                            <option value="">-- Select Order Status --</option>
                                            <option value="Pending" @selected($order->order_status == 'Pending')>Pending</option>
                                            <option value="Processing" @selected($order->order_status == 'Processing')>Processing</option>
                                            <option value="Complete"  @selected($order->order_status == 'Complete')>Complete</option>
                                            <option value="Cancel"  @selected($order->order_status == 'Cancel')>Cancel</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update Order Info</button>
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

