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
                    <li class="breadcrumb-item active" aria-current="page">All Order</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">All Order Info</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Info</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->customer->name}}<br/>{{$order->customer->mobile}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>{{$order->order_total}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->payment_status}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('order.detail', $order->id)}}" title="Order Detail" class="btn btn-info me-2">
                                                <i class="fa fa-bookmark-o"></i>
                                            </a>
                                            <a href="{{route('order.edit', $order->id)}}" title="Order Edit" class="btn btn-primary me-2 {{$order->order_status == 'Complete' ? 'disabled' : ''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('order.invoice', $order->id)}}" title="Order Invoice" class="btn btn-success me-2">
                                                <i class="fa fa-book"></i>
                                            </a>
                                            <a href="{{route('order.download-invoice', $order->id)}}" target="_blank" title="Download Invoice" class="btn btn-secondary me-2">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            <form action="{{route('order.destroy', $order->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger {{$order->order_status == 'Cancel' ? ' ' : 'disabled'}}" onclick="return confirm('Are you sure to delete this..');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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
