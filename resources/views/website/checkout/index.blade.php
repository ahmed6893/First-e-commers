@extends('website.master')

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li >
                                <h6 class="title">Order Checkout Information </h6>
                                <form action="{{route('new-order')}}" method="POST">
                                    @csrf
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        <textarea placeholder="Delivery Address" class="pt-2" name="delivery_address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label >Payment Method</label>
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="radio" checked id="checkbox-3" name="payment_method" value="Cash">
                                                    <label for="checkbox-3"><span>Cash on delivery</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="radio" id="checkbox-3" name="payment_method" value="Online">
                                                    <label for="checkbox-3"><span>Online</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" type="submit">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="checkout-sidebar-price-table col-lg-4">
                    <h5 class="title">Cart Summary</h5>
                    <div class="sub-total-price">
                        @php($sum =0)
                        @foreach(Cart::content() as $item)
                            <div class="total-price">
                                <p class="value">
                                    <b>Name :</b>{{$item->name}} <br/>
                                    <b>Price :</b>{{$item->price}} <br/>
                                    <b>Quantity :</b>{{$item->qty}}
                                </p>
                                <p class="price">{{$item->price * $item->qty}}</p>
                            </div>
                            @php($sum = $sum+($item->price * $item->qty))
                        @endforeach
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Subotal Price:</p>
                                <p class="price">TK. {{$sum}}</p>
                            </div>
                            <div class="payable-price">
                                <p class="value">Tax Amount 15%</p>
                                <p class="price">TK.{{$tax = round(($sum * 0.15))}}</p>
                            </div>
                            <div class="payable-price">
                                <p class="value">Shipping</p>
                                <p class="price">TK. {{$shipping =100}}</p>
                            </div>
                            <div class="payable-price">
                                <p class="value">Total Payable</p>
                                <p class="price">TK. {{$totalPayable = $sum + $tax +$shipping }}</p>
                            </div>
                        </div>
                    </div>
                    <?php
                    Session::put('order_total',$totalPayable);
                    Session::put('tax_total',$tax);
                    Session::put('shipping_total',$shipping);
                    ?>
                    <div class="checkout-sidebar-banner mt-30">
                        <a href="product-grids.html">
                            <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
