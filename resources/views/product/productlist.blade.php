@foreach ($products as $product)
    <div class="col-lg-3 col-md-4 col-6">
        <a href="/shop/product-detail/{{$product->id}}" class="product__item">
            <div class="product__header">
                @if (isset($product->price_sale))
                    <p class="product__sale-off">Giảm {{ App\Lib\Helper::salePercent($product->price, $product->price_sale).'%'}}</p>
                @endif
                {{-- <p class="product__hidden">x</p> --}}

            </div>
            <div class="product__image">
                <img src="{{$product->image}}" alt="">
            </div>
            <h3 class="product__name">{{$product->name}}</h3>
            <div class="product__price-wrapper">
                @if (isset($product->price_sale))
                    <p class="product__old-price">{{App\Lib\Helper::formatCurrency($product->price)}}</p>
                    <p class="product__sale-price">{{App\Lib\Helper::formatCurrency($product->price_sale)}}</p>
                @else
                    <p class="product__sale-price">{{App\Lib\Helper::formatCurrency($product->price)}}</p>
                @endif
            </div>
            
        </a>
    </div>
    
@endforeach
