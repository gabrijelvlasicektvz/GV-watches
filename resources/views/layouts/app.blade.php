<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>GV watches</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/theme/favicon.ico')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@livewireStyles
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                        <ul>
                                <li>
                                @php
    $languages = [
        'en' => ['name' => 'English', 'flag' => 'flag-en.png'],
        'fr' => ['name' => 'Français', 'flag' => 'flag-fr.png'],
        'de' => ['name' => 'Deutsch', 'flag' => 'flag-dt.png'],
        'es' => ['name' => 'Español', 'flag' => 'flag-es.png'],
        'it' => ['name' => 'Italiano', 'flag' => 'flag-it.png'],
    ];

    $current = app()->getLocale();
@endphp

<a class="language-dropdown-active" href="#">
    <img src="{{ asset('assets/imgs/theme/' . $languages[$current]['flag']) }}" alt="" style="width: 16px; margin-right: 5px;">
    {{ $languages[$current]['name'] }}
    <i class="fi-rs-angle-small-down"></i>
</a>

<ul class="language-dropdown">
    @foreach($languages as $code => $lang)
        @if($code !== $current)
            <li>
                <a href="{{ route('change.language', $code) }}">
                    <img src="{{ asset('assets/imgs/theme/' . $lang['flag']) }}" alt="" style="width: 16px; margin-right: 5px;">
                    {{ $lang['name'] }}
                </a>
            </li>
        @endif
    @endforeach
</ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                     <li>{{ __('messages.quote_1') }}</li>
                                    <li>Audemars Piguet</li>
                                    <li>{{ __('messages.quote_2') }}</li>
                                    <li>Breguet</li>
                                    <li>{{ __('messages.quote_3') }}</li>
                                    <li>Breitling</li>
                                    <li>{{ __('messages.quote_4') }}</li>
                                    <li>Cartier</li>
                                    <li>{{ __('messages.quote_5') }}</li>
                                    <li>Hublot</li>
                                    <li>{{ __('messages.quote_6') }}</li>
                                    <li>Jacob&Co</li>
                                    <li>{{ __('messages.quote_7') }}</li>
                                    <li>Jaeger LeCoultre</li>
                                    <li>{{ __('messages.quote_8') }}</li>
                                    <li>Omega</li>
                                    <li>{{ __('messages.quote_9') }}</li>
                                    <li>Panerai</li>
                                    <li>{{ __('messages.quote_10') }}</li>
                                    <li>Patek Philippe</li>
                                    <li>{{ __('messages.quote_11') }}</li>
                                    <li>Richard Mille</li>
                                    <li>{{ __('messages.quote_12') }}</li>
                                    <li>Rolex</li>
                                    <li>{{ __('messages.quote_13') }}</li>
                                    <li>TAG Heuer</li>
                                    <li>{{ __('messages.quote_14') }}</li>
                                    <li>Tudor</li>
                                    <li>{{ __('messages.quote_15') }}</li>
                                    <li>Vacheron Constantin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        @auth
                        <ul>
                            <li><i class="fi-rs-user"></i>{{Auth::user()->name}} /
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('messages.logout') }}</a>
                            </form>
                        </li>
                        </ul>
                        @else
                        <ul>
                            <li><i class="fi-rs-key"></i><a href="{{route('login')}}">{{ __('messages.login') }}</a> / <a href="{{route('register')}}">{{ __('messages.sign_up') }}</a></li>
                        </ul>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="#"><img src="{{ asset('assets/imgs/logo/GV watches logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        @livewire('header-search-component')
                        <div class="header-action-right">
                            <div class="header-action-2">
                              @livewire('wishlist-icon-component');
                              @livewire('cart-icon-component');
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="assets/imgs/logo/GV watches logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="/">{{ __('messages.home') }}</a></li>
                                    <li><a href="{{route('shop')}}">{{ __('messages.shop') }}</a></li>
                                    <li><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                                    @auth
                                    <li><a href="#">{{ __('messages.my_account') }}<i class="fi-rs-angle-down"></i></a>
                                    @if(Auth::user()->utype=='ADM')
                                    <ul class="sub-menu">
                                    <li><a href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                                    <li><a href="{{ route('admin.products') }}">{{ __('messages.products') }}</a></li>
                                    <li><a href="{{ route('admin.categories') }}">{{ __('messages.categories') }}</a></li>
                                    </ul>
                                    @else
                                    <ul class="sub-menu">
                                    <li><a href="{{ route('user.dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                                    </ul>
                                    @endif
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>{{ __('messages.toll_free') }}</span> (+385) 099-700-1986 </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

        {{$slot}}

    <footer class="main">

        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="{{ asset('assets/imgs/logo/GV watches logo.png') }}" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">{{ __('messages.contact') }}</h5>
                            <p class="wow fadeIn animated">
                                <strong>{{ __('messages.address') }}: </strong>Perkovčeva 21, Samobor
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>{{ __('messages.phone') }}: </strong>+385 099 200 3445
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>{{ __('messages.email') }}: </strong>gvwatches@gmail.com
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">{{ __('messages.follow_us') }}</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">{{ __('messages.about') }}</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">{{ __('messages.about_us') }}</a></li>
                            <li><a href="#">{{ __('messages.delivery_info') }}</a></li>
                            <li><a href="#">{{ __('messages.privacy_policy') }}</a></li>
                            <li><a href="#">{{ __('messages.terms_conditions') }} &amp; {{ __('messages.terms_conditions') }}</a></li>
                            <li><a href="#">{{ __('messages.contact_us') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">{{ __('messages.my_account') }}</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">{{ __('messages.my_account') }}</a></li>
                            <li><a href="#">{{ __('messages.view_cart') }}</a></li>
                            <li><a href="#">{{ __('messages.my_wishlist') }}</a></li>
                            <li><a href="#">{{ __('messages.track_order') }}</a></li>
                            <li><a href="#">{{ __('messages.order') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">{{ __('messages.install_app') }}</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">{{ __('messages.from_app_store') }}</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{ asset('assets/imgs/theme/app-store.jpg') }}" alt=""></a>
                                    <a href="#" class="hover-up"><img src="{{ asset('assets/imgs/theme/google-play.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">{{ __('messages.payment_gateways') }}</p>
                                <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}" alt="Payment Methods">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">{{ __('messages.privacy_policy') }}</a> | <a href="terms-conditions.html">{{ __('messages.terms_conditions') }}</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">GVwatches</strong> {{ __('messages.copyright') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/js/main.js?v=3.3')}}"></script>
<script src="{{ asset('assets/js/shop.js?v=3.3')}}"></script>
@livewireScripts
@stack('scripts')
</body>
</html>
