@extends('website.master')
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <h4 class="text-center text-success">{{Session('message')}}</h4>
            <div class="cart-list-head">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @php($sum=0)
                @foreach($products as $product)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="{{asset($product->options->image)}}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="">
                                    {{$product->name}}</a></h5>
                            <p class="product-des">
                                <span><em>Color:</em>{{$product->options->color}}</span>
                                <span><em>Size:</em>{{$product->options->size}}</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <form action="{{route('cart.update',$product->rowId)}}" method="post">
                                @csrf
                                @method('PUT')
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$product->qty}}" name="qty">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>${{$product->price}}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$product->price*$product->qty}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <form class="remove-item" action="{{route('cart.destroy',$product->rowId)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="lni lni-close"></i></button>
                                </form>
                        </div>
                    </div>
                </div>
                    @php($sum = $sum +($product->price*$product->qty))
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                            <li>Cart Subtotal<span>{{ $subTotal=round($sum) }}</span></li>
                                        <li>Tax Amount 15%<span>{{ $tax=round(($sum * 0.15)) }}</span></li>
                                        <li>Shipping Cost<span>{{ $shipping = 100 }}</span></li>
                                        <li class="last">Total Payable<span>{{ $grandTotal= round($sum + $tax + $shipping) }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </d iv>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
