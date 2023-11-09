@extends('fontend.layouts.main')

@section('body')
    @include('fontend.layouts.menu')
    @include('fontend.layouts.breadcrumb')
    
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Category</h4>

                            @include('fontend.layouts.category')
                            
                        </div>
                        
                        
                        <div class="sidebar__item">
                            <h4>Best brand</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    <a href="/shop/band/dior">Dior</a>
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    <a href="/shop/band/ysl">YSL</a>
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    <a href="/shop/band/chanel">chanel</a>
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    <a href="/shop/band/tom-ford">Tom Ford</a>
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-prdouct__slider__item">
                                    @php
                                        $latestProducts = App\Lib\HelperProduct::getLatest(3);
                                    @endphp
                                    @foreach ($latestProducts as $itemLatest )
                                        <a href="/shop/product-detail/{{$itemLatest->id}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{$itemLatest->image}}"
                                                    alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$itemLatest->name}}</h6>
                                                @if (isset($itemLatest->price_sale))
                                                    <span class="latest-product__item__price__sale">
                                                        {{ App\Lib\Helper::formatCurrency($itemLatest->price) }}
                                                    </span>
                                                    <span class="latest-product__item__price">
                                                        {{ App\Lib\Helper::formatCurrency($itemLatest->price_sale) }}
                                                    </span>
                                                @else
                                                    <span class="latest-product__item__price__sale">
                                                        {{ App\Lib\Helper::formatCurrency($itemLatest->price) }}
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
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-8 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $count }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By: </span>
                                    <select style="display: none;">
                                        <option value="default">Default</option>
                                        <option value="asc">Giá tăng dần</option>
                                        <option value="desc">Giá giảm dần</option>
                                    </select>
                                    <div class="nice-select" tabindex="0"><span class="current">Default</span>
                                        <ul class="list">
                                            <li class="option"><a href="{{ request()->url()}}">Default</a></li>
                                            <li class="option"><a href="{{ request()->fullUrlWithQuery(['price'=> 'asc'])}}">Giá tăng dần</a></li>
                                            <li class="option"><a href="{{ request()->fullUrlWithQuery(['price'=> 'desc'])}}">Giá giảm dần</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    {{-- product-list --}}
                    <div class="row">
                        
                        @include('product.productshoplist')
                        
                    </div>
                    <div style="display:flex; justify-content: flex-end;">
                        {!! $products->links('admin.pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
