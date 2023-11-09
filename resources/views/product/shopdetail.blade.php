@extends('fontend.layouts.main')

@section('body')
@include('fontend.layouts.breadcrumb')
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{ $product->image}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3 class="font-serif">{{ $product->name }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price__wrapper">
                        @if (!isset($product->price_sale))
                            <span class="product__details__price__sale">{{ App\Lib\Helper::formatCurrency($product->price) }}</span>
                        @else
                            <span class="product__details__price__sale">{{ App\Lib\Helper::formatCurrency($product->price_sale) }}</span>
                            <span class="product__details__price">{{ App\Lib\Helper::formatCurrency($product->price) }}</span>
                        @endif

                    </div>
                    <p class="font-serif"><span class="fw-bold">{{ $product->name }}, </span>{{ $product->description }}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <form action="/cart/add" method="post" class="detail-product__form">
                                <input type="hidden" name="product-id" value="{{$product->id}}">
                                <div class="quantity__wrapper">
                                    <span class="dec quanlity-btn" onclick="detailDecrease({{$product->id}})">-</span>
                                    <input type="number" value="1" name="product-quantity" readonly class="product-quanlity-{{$product->id}}">
                                    <span class="inc quanlity-btn " onclick="detailIncrease({{$product->id}})">+</span>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                        
                    <a  class="primary-btn btn-addtocart" onclick="productDetailSubmit()">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Tình trạng:</b> <span>Còn hàng</span></li>
                        <li><b>Phong cách:</b> <span>Cổ điển, gợi cảm, mạnh mẽ</span></li>
                        <li><b>Giao hàng:</b> <span><samp>FreeShip HCM & Hà Nội</samp></span></li>
                        <li><b>Trọng lượng:</b> <span>200 g</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>

                
            </div>
            @if (isset($product->description))
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link fs-4 active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả chi tiết sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <div class="product__details__tab__content">
                                        <p>{{ $product->name }}, </p> 
                                        {!! $product->content !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endif
        </div>
    </div>
</section>

@include('product.relatedproduct')
@endsection