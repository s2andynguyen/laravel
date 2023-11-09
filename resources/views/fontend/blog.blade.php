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
                <div class="col-lg-4 col-md-5">
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <a href="/blog/post-content">
                                    <div class="blog__item__pic">
                                        <img src="{{url('my-assets')}}/img/blog/blog-banner-1.png" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> October 21,2023</li>
                                            <li><i class="fa fa-comment-o"></i> 38</li>
                                        </ul>
                                        <h5 class="blog__item__title"><a href="#">Dior Sauvage: Hương thơm lịch lãm cho nam giới</a></h5>
                                        <p class="blog__item__content">Dior Sauvage là một sự kết hợp đầy tinh tế giữa sự tươi mát và dại dáng. Hương thơm của Dior Sauvage thể hiện sự tự nhiên và cá tính, mang lại cảm giác mạnh mẽ và hiện đại cho người đàn ông. Với những ghi chú hương độc đáo, đây là một loại nước hoa độc đáo và thú vị, thích hợp cho mọi dịp và phong cách.</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- item 2 --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <a href="/blog/post-content">
                                    <div class="blog__item__pic">
                                        <img src="{{url('my-assets')}}/img/blog/blog-banner-2.png" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> October 23,2023</li>
                                            <li><i class="fa fa-comment-o"></i> 79</li>
                                        </ul>
                                        <h5 class="blog__item__title"><a href="#">Dolce & Gabbana D&G The One Grey Intense: Mùi hương tinh tế</a></h5>
                                        <p class="blog__item__content">Nước Hoa Nam Dolce & Gabbana D&G The One Grey Intense, một tượng đài về quyến rũ và cá tính, là một biểu tượng của sự thể hiện bản thân qua mùi hương. Từ sự tinh tế của các tinh dầu tự nhiên và phức hợp của hương liệu, nước hoa tạo ra không gian thơm lâng và gợi lên cảm xúc. Mỗi loại nước hoa mang trong mình một tâm hồn riêng, làm tôn lên sự tự tin và cuốn hút</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- item 3 --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <a href="/blog/post-content">
                                    <div class="blog__item__pic">
                                        <img src="{{url('my-assets')}}/img/blog/blog-banner-3.png" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> October 25,2023</li>
                                            <li><i class="fa fa-comment-o"></i> 89</li>
                                        </ul>
                                        <h5 class="blog__item__title"><a href="#">Gucci Guilty Absolute Pour Homme Eau De Parfume: Mùi hương cuốn hút</a></h5>
                                        <p class="blog__item__content">Nước Hoa Nam Gucci Guilty Absolute Pour Homme Eau De Parfume, là một loại sản phẩm thời trang và làm đẹp không thể thiếu trong cuộc sống hàng ngày. Được tạo ra từ sự kết hợp tinh tế của các tinh dầu tự nhiên và hợp chất hương liệu, nước hoa là một biểu tượng của sự quyến rũ và cá tính. Mỗi loại nước hoa mang trong mình một câu chuyện riêng, một hương thơm độc đáo và một sự biểu đạt cá nhân. Chúng có thể tạo ra cảm giác tự tin, cuốn hút và thậm chí là gợi lên kí ức và cảm xúc.</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        


                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
