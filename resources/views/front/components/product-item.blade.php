<form action="">
<div class="product-item item {{$product->tag}}">
    <div class="pi-pic">
        
        {{-- <img src="front/img/products/{{$product->productImage[0]->path}}" alt=""> --}}
        @foreach ($product->productImages as $productImage)
            <div class="pt active" data-imgbigurl="front/img/products/{{ $productImage->path }}">
                <a href="shop/product/{{$product->id}}">
                    <img src="front/img/products/{{ $productImage->path }}" alt="">
                </a>
            </div>
        @endforeach

        @if ($product->discount != null)
            <div class="sale">Sale</div>
        @endif 
        
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
            <ul>
                <li class="w-icon active"><a href="cart/add/{{$product->id}}"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="shop/product/{{$product->id}}">+ Quick View</a></li>
                <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
            </ul>
        
    </div>
    <div class="pi-text">
        <div class="catagory-name">${{$product->tag}}</div>
        <a href="shop/product/{{$product->id}}">
            <h5>{{$product->name}}</h5>
        </a>
        <div class="product-price">
            @if ($product->discount != null)
                ${{$product->discount}}
                <span>${{$product->price}}</span>
            @else
                ${{$product->price}}
            @endif
        </div>
    </div>
    {{-- @php
    session()->flush();
    @endphp --}}
</div>
</form>