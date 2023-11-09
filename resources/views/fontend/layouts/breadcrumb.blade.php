<section class="breadcrumb-section set-bg" data-setbg="{{url('my-assets')}}/img/banner/banner-sub2.png" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text" >
                    {{-- #3f6353 --}}
                    <h2 class="my-breadcrumb__title" style="color: #f2994a; text-shadow: 0 0 10px #fff"
                    onclick="window.location.href='/'">Tun Luxury</h2>
                    <div class="my-breadcrumb" >
                        <a href="/" class="my-breadcrumb__home" >Home </a>
                        @if (isset($title) && $title != 'home')
                            <span class="breadcrumb__spread">-</span>
                            <span  class="my-breadcrumb__current">{{ $title }}</span>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>