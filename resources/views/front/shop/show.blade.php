@extends('front.layout.master')

@section('title', 'Product')

@section('body') 

{{-- Điều hướng --}}
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i>Home</a>
                    <a href="/shop">Shop</a>
                    <span>Product</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end điều hướng --}}

{{-- main --}}
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.shop.components.products-sidebar-filter') 
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img src="front/img/products/{{ $product->productImages[0]->path ?? ''}}" class="product-big-img">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->productImages as $productImage)
                                        <div class="pt active" data-imgbigurl="front/img/products/{{ $productImage->path }}">
                                            <img src="front/img/products/{{ $productImage->path }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->tag }}</span>
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="heart_icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa-start"></i>
                                    <i class="fa-start"></i>
                                    <i class="fa-start"></i>
                                    <i class="fa-start"></i>
                                    <i class="fa-start-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{ $product->content }}</p>

                                    @if($product->discount != null)
                                        <h4>${{ $product->discount }} <span>{{ $product->price }}</span></h4>
                                    @else
                                        <h4>${{ $product->price }}</h4>
                                    @endif

                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">

                                        @php
                                        $colors = array_unique(array_column($product->productDetails->toArray(), 'color'));
                                        @endphp

                                        @foreach ($colors as $productColor)
                                            <div class="cc-item">
                                                <input type="radio" name="color" id="cc-{{ $productColor }}">
                                                <label for="cc-{{ $productColor }}" class="cc-{{ $productColor }}"></label>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>

                                <div class="pd-size-choose">
                                    @php
                                        $sizes = array_unique(array_column($product->productDetails->toArray(), 'size'));
                                    @endphp

                                    @foreach ($sizes as $productSize)               
                                        <div class="sc-item">
                                            <input type="radio" id="sm-{{ $productSize}}">
                                            <label for="sm-{{ $productSize}}">{{ $productSize }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                    <a href="#" class="primary-btn pd-cart">Add To cart</a>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{ $product->productCategory->name}} </li>
                                    <li><span>TAGS</span>: Clothing, T-Shirt, Woman</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku: {{ $product->sku}}</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">   
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">DESCRIPTION</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFICATIONS</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Customer Reviews ({{count($product->productComments)}})</a></li>   
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p> {!! $product->description !!}</p>
                                                <h5>Features</h5>
                                                <p>Features Features Features Features FeaturesFeaturesFeaturesFeaturesFeaturesFeaturesFeatures Features</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="front/img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                        {!! $product->description !!}
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-start"></i>
                                                        <i class="fa fa-start"></i>
                                                        <i class="fa fa-start"></i>
                                                        <i class="fa fa-start"></i>
                                                        <i class="fa fa-start-o"></i>
                                                        <span>({{ count($product->productComments) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">
                                                        $ {{ $product->price }} 
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ Add To Cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">{{ $product->qty }} in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @php
                                                            $sizes = array_unique(array_column($product->productDetails->toArray(), 'size'));
                                                        @endphp
                                                        @foreach ($sizes as $productSize)
                                                            {{ $productSize }}
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td>
                                                    <span class="p-color">
                                                        @php
                                                            $colors = array_unique(array_column($product->productDetails->toArray(), 'color'));
                                                        @endphp
                                                        @foreach ($colors as $productColor)
                                                            {{ $productColor }}
                                                        @endforeach
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{ $product->sku }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productComments) }} Comments</h4>
                                        <div class="comment-option">

                                            @foreach ($product->productComments as $productComment)
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="front/img/user/{{ $productComment->user->avatar ?? 'default-avatar.jpg' }}" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-start"></i>
                                                            <i class="fa fa-start"></i>
                                                            <i class="fa fa-start"></i>
                                                            <i class="fa fa-start"></i>
                                                            <i class="fa fa-start-o"></i>
                                                        </div>
                                                        <h5>{{ $productComment->name }} <span>{{ date('M d, Y', strtotime($productComment->create_at)) }}</span></h5>
                                                        <div class="at-reply">{{ $productComment->messages }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="personal-rating">
                                            <h6>Your Rating</h6>
                                            <div class="rating">
                                                <i class="fa fa-start"></i>
                                                <i class="fa fa-start"></i>
                                                <i class="fa fa-start"></i>
                                                <i class="fa fa-start"></i>
                                                <i class="fa fa-start-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="/shop/product/{id}" class="comment-form" method="post">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">

                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name">
                                                    </div> 
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea name="" id="" cols="30" rows="10" placeholder="Message" name="messages"></textarea>
                                                        <button type="submit" class="btn btn-primary">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--  --}}

{{-- Product liên quan --}}
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="setion-title">
                        <h2 class="text-center" style="padding: 20px;">Related products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProduct as $product)
                    
                    @include('front.components.product-item')

                @endforeach
            </div>
        </div>
    </div>
{{--  --}}
@endsection