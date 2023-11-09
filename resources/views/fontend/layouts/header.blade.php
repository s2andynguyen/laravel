 <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="/my-assets/img/logo/logo.png" alt="" width="80%"></a>
    </div>
    <div class="humberger__menu__cart">
        @php
            $countCart = App\Lib\HelperProduct::getCountCart();
            $cartTotal = App\Lib\HelperProduct::getTotalCart();
        @endphp
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li>
                <a href="/cart"><i class="fa fa-shopping-bag"></i>
                    @if (isset($countCart))
                        <span>{{$countCart}}</span>
                    @else
                        <span>0</span>
                    @endif
                </a>
            </li>
        </ul>
        <div class="header__cart__price">item: 
            {{ App\Lib\Helper::formatCurrency($cartTotal)}}
        </div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{url('site')}}/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        @php
            use App\Lib\Helper;
            $info = Helper::getUserInfo();
        @endphp
        @if (isset($info))
            @if (isset($info['level']) && $info['level'] == 1)
                <span>|</span>
                <div class="header__top__right__auth ms-1">
                    <a href="/admin/main">Admin <i class="fa-solid fa-outdent"></i></a>
                </div>
            @endif
            <div class="header__top__right__auth" style="">
                <a href="/admin/logout">| Log out <i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        @else
            <div class="header__top__right__auth">
                <a href="/admin/login"><i class="fa fa-user"></i> Login</a>
            </div>
        @endif
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            @php
                use App\Lib\HelperMenu;
                echo HelperMenu::getMenu();
            @endphp
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> thanhtungnguyen9911@gmail.com</li>
            <li>FreeShip HCM & Hà Nội</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> thanhtungnguyen9911@gmail.com</li>
                            <li>FreeShip HCM & Hà Nội</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{url('site')}}/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        
                        @if ($info)
                            <div class="header__top__right__auth" style="">
                                <p class="mb-0" style="font-size: 14px;">Xin chào! {{ $info['username'] }}</p>
                            </div>
                            @if (isset($info['level']) && $info['level'] == 1)
                                <span>|</span>
                                <div class="header__top__right__auth ms-1">
                                    <a href="/admin/main">Admin <i class="fa-solid fa-outdent"></i></a>
                                </div>
                            @endif
                            <div class="header__top__right__auth" style="">
                                <a href="/admin/logout">| Log out <i class="fa-solid fa-right-from-bracket"></i></a>
                            </div>
                        @else
                            <div class="header__top__right__auth" style="">
                                <a href="/admin/login"><i class="fa fa-user"></i> Login</a>
                            </div>
                            <span>|</span>
                            <div class="header__top__right__auth ms-1">
                                <a href="/admin/register"><i class="fa-solid fa-pen-to-square"></i> Register</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="{{url('my-assets')}}/img/logo/logo.png" alt="" width="150px"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        @php
                            echo HelperMenu::getMenu();
                        @endphp
                    </ul>
                    
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li>
                            <a href="/cart"><i class="fa fa-shopping-bag"></i>
                                @if (isset($countCart))
                                    <span>{{$countCart}}</span>
                                @else
                                    <span>0</span>
                                @endif
                        </a></li>
                    </ul>
                    <div class="header__cart__price">item: 
                        <span>{{ App\Lib\Helper::formatCurrency($cartTotal )}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->