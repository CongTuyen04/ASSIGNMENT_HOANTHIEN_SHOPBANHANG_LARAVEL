@extends('front.layout.master')

@section('title', 'Shopping Cart')

@section('body') 

{{-- Điều hướng --}}
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i>Home</a>
                    <a href="/shop">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end điều hướng --}}

{{-- content --}}
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantily</th>
                                    <th>Total</th>
                                    <th><i class="ti close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img style="height: 70px;" src="front/img/products/{{$cart->options->images[0]->path}}" alt="">
                                        </td>
                                        <td class="cart-title first-row"><h5>{{ $cart->name }}</h5></td>
                                        <td class="p-price first-row">${{ number_format($cart->price, 2) }}</td>
                                        <td class="qua-col first-row">
                                            <div class="quantily">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{$cart->qty}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">${{ number_format($cart->price * $cart->qty, 2) }}</td>
                                        <td class="close-td first-row"><i class="ti-close"></i></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update Cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter you codes">
                                <button type="button" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>${{$total}}</span></li>
                                    <li class="cart-total">Total <span>${{$subtotal}}</span></li>
                                </ul>
                                <a href="/check-out" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--  --}}

@endsection