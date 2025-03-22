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
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order Product Info</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Order ID</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Customer Info</th>
                                <td>
                                  Name :  {{$order->customer->name}} <br/>
                                  Mobile :  {{$order->customer->mobile}}
                                </td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Tax Total</th>
                                <td>{{$order->tax_total}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Total</th>
                                <td>{{$order->shipping_total}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Status</th>
                                <td>{{$order->delivery_status}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Date</th>
                                <td>{{$order->delivery_date}}</td>
                            </tr>
                            <tr>
                                <th>Payment Method</th>
                                <td>{{$order->payment_method}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$order->payment_status}}</td>
                            </tr>
                            <tr>
                                <th>Payment Date</th>
                                <td>{{$order->payment_date}}</td>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <td>{{$order->currency}}</td>
                            </tr>
                            <tr>
                                <th>Transaction ID</th>
                                <td>{{$order->transaction_id}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Order Product Info</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <p class="text-success text-center">{{session('message')}}</p>
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Color</th>
                                    <th>Product Size</th>
                                    <th>Unit Price</th>
                                    <th>Product Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $orderDetail)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$orderDetail->product_name}}</td>
                                            <td>{{$orderDetail->product_code}}</td>
                                            <td>{{$orderDetail->product_color}}</td>
                                            <td>{{$orderDetail->product_size}}</td>
                                            <td>{{$orderDetail->product_price}}</td>
                                            <td>{{$orderDetail->product_qty}}</td>
                                            <td>{{$orderDetail->product_price * $orderDetail->product_qty}}</td>
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
