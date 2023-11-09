@extends('fontend.layouts.main')

@section('body')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>

                    @include('fontend.layouts.category')
                    
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+0967 666.666</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{url('my-assets')}}/img/banner/banner-home2.png">
                    <div class="hero__text">
                        
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            @php
                $listSlides = App\Lib\HelperProduct::getSlide();
            @endphp
            <div class="categories__slider owl-carousel">
                @foreach ($listSlides as $slideItem )
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{$slideItem->image}}">
                        <h5><a href="/shop/band/{{$slideItem->category->slug}}">{{$slideItem->category->name}}</a></h5>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
<div class="wrapper-breadcrumb container mt-4">

    @include('fontend.layouts.breadcrumb')
</div>

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                
        </div>
        <div class="row">
            <div class="filter__sort d-flex justify-content-end align-items-center">
                <span>Sort By: </span>
                <div class="nice-select" tabindex="0"><span class="current">Default</span>
                    <ul class="list">
                        <li class="option"><a  href="{{ request()->url()}}">Default</a></li>
                        <li class="option"><a  href="{{ request()->fullUrlWithQuery(['price'=> 'asc'])}}">Giá tăng dần</a></li>
                        <li class="option"><a  href="{{ request()->fullUrlWithQuery(['price'=> 'desc'])}}">Giá giảm dần</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product__wrapper row" id="product__wrapper">
            @include('product.productlist')
        </div>

        <div class="home-btn__loadmore d-flex justify-content-center" >
            <input type="hidden" value="1" id="homepage">
            <a class="btn" onclick="loadMore()" id="btn__loadmore">Xem thêm</a>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="/shop/band/ysl">
                            <img src="{{url('my-assets')}}/img/banner/banner-sale1.png" alt="">
                        </a>
                    </div>
            </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="/shop/band/chanel">
                            <img src="{{url('my-assets')}}/img/banner/banner-sale2.png" alt="">
                        </a>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
                @php
                    $latestProducts = App\Lib\HelperProduct::getLatest(3);
                    $premiumProducts = App\Lib\HelperProduct::getPremium(3);
                    $popularProducts = App\Lib\HelperProduct::getPopular(3);
                @endphp
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-prdouct__slider__item hompage">
                        @foreach ($latestProducts as $item )
                            <a href="/shop/product-detail/{{$item->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$item->image}}"
                                        alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$item->name}}</h6>
                                    @if (isset($item->price_sale))
                                        <span class="latest-product__item__price__sale">
                                            {{ App\Lib\Helper::formatCurrency($item->price) }}
                                        </span>
                                        <span class="latest-product__item__price">
                                            {{ App\Lib\Helper::formatCurrency($item->price_sale) }}
                                        </span>
                                    @else
                                        <span class="latest-product__item__price__sale">
                                            {{ App\Lib\Helper::formatCurrency($item->price) }}
                                        </span>

                                    @endif
                                </div>
                            </a>
                            
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Premium Products</h4>
                    <div class="latest-prdouct__slider__item hompage">
                        @foreach ($premiumProducts as $item )
                            <a href="/shop/product-detail/{{$item->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$item->image}}"
                                        alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$item->name}}</h6>
                                    @if (isset($item->price_sale))
                                        <span class="latest-product__item__price__sale">
                                            {{ App\Lib\Helper::formatCurrency($item->price) }}
                                        </span>
                                        <span class="latest-product__item__price">
                                            {{ App\Lib\Helper::formatCurrency($item->price_sale) }}
                                        </span>
                                    @else
                                        <span class="latest-product__item__price__sale">
                                            {{ App\Lib\Helper::formatCurrency($item->price) }}
                                        </span>

                                    @endif
                                </div>
                            </a>
                            
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Popular Products</h4>
                    <div class="latest-prdouct__slider__item hompage">
                        @foreach ($popularProducts as $item )
                            <a href="/shop/product-detail/{{$item->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$item->image}}"
                                        alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$item->name}}</h6>
                                    @if (isset($item->price_sale))
                                        <span class="latest-product__item__price__sale">
                                            {{ App\Lib\Helper::formatCurrency($item->price) }}
                                        </span>
                                        <span class="latest-product__item__price">
                                            {{ App\Lib\Helper::formatCurrency($item->price_sale) }}
                                        </span>
                                    @else
                                        <span class="latest-product__item__price__sale">
                                            {{ App\Lib\Helper::formatCurrency($item->price) }}
                                        </span>

                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
@include('fontend.layouts.fromblog')
<!-- Blog Section End -->



@endsection

