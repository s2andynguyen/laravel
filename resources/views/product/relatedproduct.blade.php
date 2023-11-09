<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($related as $itemRelated )
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="/shop/product-detail/{{$itemRelated->id}}" class="product__item">
                    <div class="product__header">
                        @if (isset($itemRelated->price_sale))
                            <p class="product__sale-off">Giảm {{ App\Lib\Helper::salePercent($itemRelated->price, $itemRelated->price_sale).'%'}}</p>
                        @endif
                        {{-- <p class="product__hidden">x</p> --}}
        
                    </div>
                    <div class="product__image">
                        <img src="{{$itemRelated->image}}" alt="">
                    </div>
                    <h3 class="product__name">{{$itemRelated->name}}</h3>
                    <div class="product__price-wrapper">
                        @if (isset($itemRelated->price_sale))
                            <p class="product__old-price">{{App\Lib\Helper::formatCurrency($itemRelated->price)}}</p>
                            <p class="product__sale-price">{{App\Lib\Helper::formatCurrency($itemRelated->price_sale)}}</p>
                        @else
                            <p class="product__sale-price">{{App\Lib\Helper::formatCurrency($itemRelated->price)}}</p>
                        @endif
                    </div>
                    
                </a>
            </div>
                
            @endforeach
            
        </div>
    </div>
</section>