@extends('fontend.layouts.main')

@section('body')

    @include('fontend.layouts.menu')
    <!-- Breadcrumb Section Begin -->
    @include('fontend.layouts.breadcrumb')

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        @if (count($cart) > 0)
                        <form class="form-cart-product" action="" method="POST">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th class="">Tên sản phẩm"</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $product_id=>$item )
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $item['product']->image }}" alt="">
                                            </td>
                                            <td class="shoping__cart__name">
                                                <h5>{{ $item['product']->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">

                                                @if (isset($item['product']->price_sale))
                                                    {{ App\Lib\Helper::formatCurrency($item['product']->price_sale) }}
                                                @else
                                                    {{ App\Lib\Helper::formatCurrency($item['product']->price) }}
                                                @endif

                                            </td>
                                            <td class="shoping__cart__quantity">
                                                {{-- <input type="text" name="newqty[]" value="{{$item['quantity']}}"> --}}
                                                <div class="quantity">
                                                    <div class="quantity__wrapper">
                                                        <span class="dec quanlity-btn"
                                                         onclick="decreaseQty({{$product_id}},{{$item['product']->price}},{{$item['product']->price_sale}})">-</span>
                                                        <input type="number" name="quantity-product-{{$product_id}}"
                                                        value="{{$item['quantity']}}" 
                                                        readonly class="product-quanlity-{{$product_id}}" 
                                                        onchange="totalProcduct({{$product_id}},{{$item['product']->price}},{{$item['product']->price_sale}})">
                                                        <span class="inc quanlity-btn " 
                                                        onclick="increaseQty({{$product_id}},{{$item['product']->price}},{{$item['product']->price_sale}})">+</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{-- <input type="hidden" value="" class="total-cart-product-{{$product_id}}"> --}}
                                                <span class="view-total-product-{{$product_id}}">
                                                    @if (isset($item['product']->price_sale))
                                                        {{ App\Lib\Helper::formatCurrency($item['product']->price_sale * $item['quantity']) }}
                                                    @else
                                                        {{ App\Lib\Helper::formatCurrency($item['product']->price * $item['quantity']) }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <button type="button" class="btn" onclick="handleRemoveAlert({{$product_id}}, '/cart/remove')"><span class="icon_close"></span></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @csrf
                        </form>

                        @else
                            <div class="shoping-cartnull">
                                <h3 class="shoping-cartnull__title text-center font-serif"> Giỏ hàng đang trống </h3>
                                <div class="shoping-cartnull__img pb-4">
                                    <img src="/my-assets/img/cart-empty.png" alt="">
                                </div>
                                <a href="/shop" class="text-light continue-shopping-btn">Tiếp tục muc sắm</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        @if(count($cart)>0)
                            <a href="/shop" class="primary-btn cart-btn">Tiếp tục muc sắm</a>
                            <a onclick="submitFormCart()" class="primary-btn cart-btn cart-btn-right cart-update-btn"><span class="icon_loading"></span>
                                Upadate Cart</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form>
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="button" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>{{ App\Lib\Helper::formatCurrency($total)}}</span></li>
                            <li>Total <span>{{ App\Lib\Helper::formatCurrency($total)}}</span></li>
                        </ul>
                        @if(count($cart)>0)
                            <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                        @else
                            <a class="primary-btn btn-disabled">PROCEED TO CHECKOUT</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection