@extends('fontend.layouts.main')

@section('body')
    @include('fontend.layouts.menu')

    <!-- Breadcrumb Section Begin -->
    @include('fontend.layouts.breadcrumb')
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar__search">
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="button"><span class="icon_search"></span></button>
                        </form>
                    </div>
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
                                    @foreach ($latestProducts as $itemLatest)
                                        <a href="/shop/product-detail/{{ $itemLatest->id }}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ $itemLatest->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $itemLatest->name }}</h6>
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
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <h3 class="blog__details__title">
                            Nước hoa nam Dior Sauvage hương thơm thanh lịch cho phái mạnh
                        </h3>
                        <hr class=" w-50">
                        <p class="blog__details__content">Dior Sauvage là một sự kết hợp đầy tinh tế giữa sự tươi mát và dại
                            dáng. Hương thơm của Dior Sauvage thể hiện sự tự nhiên và cá tính, mang lại cảm giác mạnh mẽ và
                            hiện đại cho người đàn ông. Với những ghi chú hương độc đáo, đây là một loại nước hoa độc đáo và
                            thú vị, thích hợp cho mọi dịp và phong cách.</p>
                        <div class="blog__details__img text-center">
                            <img src="/my-assets/img/blog/blog-banner-1.png" alt="" width="80%">

                        </div>
                        <p>
                            Nước hoa nam Dior Sauvage, là một loại sản phẩm thời trang và làm đẹp không thể thiếu trong cuộc
                            sống hàng ngày. Được tạo
                            ra từ sự kết hợp tinh tế của các tinh dầu tự nhiên và hợp chất hương liệu, nước hoa là một biểu
                            tượng của sự quyến rũ và cá tính. Mỗi loại nước hoa mang trong mình một câu chuyện riêng, một
                            hương thơm độc đáo và một sự biểu đạt cá nhân. Chúng có thể tạo ra cảm giác tự tin, cuốn hút và
                            thậm chí là gợi lên kí ức và cảm xúc. Nước hoa có sức mạnh biến hóa không gian và thời gian.
                            Chúng có thể làm cho một ngày thường dễ chịu hoặc biến một dịp kỷ niệm thành đêm đáng nhớ. Với
                            nước hoa, bạn có thể tạo nên một ấn tượng đầu tiên mạnh mẽ hoặc thể hiện tâm hồn của mình. Khám
                            phá thế giới của nước hoa, và bạn sẽ thấy rằng nó là một biểu tượng của vẻ đẹp và quyền lực, và
                            cũng là một phần của cuộc sống cá nhân và thăng hoa.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <div class="blog__details__img">
                                    <img src="/my-assets/img/blog/blog-banner-2.png" alt="" width="100%">

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="blog__details__img">
                                    <img src="/my-assets/img/blog/blog-banner-3.png" alt="" width="100%">
                                </div>
                            </div>
                        </div>
                        <p>
                            Khám phá hương thơm độc đáo và tinh tế của nước hoa nam dành cho người đàn ông hiện đại. Hãy tạo
                            lên một dấu ấn riêng với sự quyến rũ và phong cách tinh tế. Được chế tạo tỉ mỉ từ những ghi chú
                            hương độc đáo, nước hoa nam là biểu tượng của sự lôi cuốn và tự tin. Đặt sự tự tin vào mọi bước
                            đi của bạn và thể hiện tinh thần phiêu lưu cùng với hương thơm đặc biệt, đồng hành trong mọi
                            cuộc hẹn và chuyến du lịch.
                        </p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <a href="https://www.facebook.com/profile.php?id=100008631608333&locale=vi_VN"
                                        target="_blank">
                                        <div class="blog__details__author__pic">
                                            <img src="/my-assets/img/avatar/admin-avt.jpg" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h6 class="san-serif">Nguyễn Thanh Tùng</h6>
                                            <span>Admin</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> Dior</li>
                                        <li><span>Tags:</span> Dior, Trending, Life Style, Man</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    @include('fontend.layouts.fromblog')
@endsection
