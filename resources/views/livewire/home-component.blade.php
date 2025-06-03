<div>

<main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ __('messages.high_quality') }}</h4>
                                    <h2 class="animated fw-900">{{ __('messages.hero_line1') }}</h2>
                                    <h1 class="animated fw-900 text-brand">{{ __('messages.hero_line2') }}</h1>
                                    <p class="animated">{{ __('messages.hero_line3') }}</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{route('shop')}}">{{ __('messages.shop_now') }}</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="assets/imgs/slider/slider-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{ __('messages.best_watches') }}</h4>
                                    <h2 class="animated fw-900">{{ __('messages.defying_excellence') }}</h2>
                                    <h1 class="animated fw-900 text-7">{{ __('messages.new_watches') }}</h1>
                                    <p class="animated">{{ __('messages.keep_going') }}</p>
                                    <a class="animated btn btn-brush btn-brush-2" href="{{route('shop')}}">{{ __('messages.discover_now') }}</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-2" src="assets/imgs/slider/slider-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">{{ __('messages.featured') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{ __('messages.popular') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">{{ __('messages.new_added') }}</button>
                        </li>
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                    @foreach($fproducts as $fproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details', ['slug'=>$fproduct->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$fproduct->image}}" alt="{{$fproduct->name}}">
                                                <img class="hover-img" src="{{ asset('assets/imgs/products')}}/{{$fproduct->image}}" alt="{{$fproduct->name}}">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                              <!--<a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>-->
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="best">{{ __('messages.featured') }}</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                        <a href="#">{{$fproduct->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details', ['slug'=>$fproduct->slug])}}">{{$fproduct->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>€{{$fproduct->regular_price}}</span>
                                              <!--<span class="old-price">$245.8</span>-->
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$fproduct->id}}, '{{$fproduct->name}}', '{{$fproduct->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one (Featured)-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                            @foreach($pproducts as $pproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details', ['slug'=>$pproduct->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$pproduct->image}}" alt="">
                                                <img class="hover-img" src="{{ asset('assets/imgs/products')}}/{{$pproduct->image}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <!--<a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>-->
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="best">{{ __('messages.popular') }}</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{$pproduct->category->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details', ['slug'=>$pproduct->slug])}}">{{$pproduct->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>€{{$pproduct->regular_price}}</span>
                                            <!--<span class="old-price">$245.8</span>-->
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$pproduct->id}}, '{{$pproduct->name}}', '{{$pproduct->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two (Popular)-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">
                        @foreach($lproducts as $lproduct)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                        <a href="{{route('product.details', ['slug'=>$lproduct->slug])}}">
                                        <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$lproduct->image}}" alt="{{$lproduct->name}}">
                                        <img class="hover-img" src="{{ asset('assets/imgs/products')}}/{{$lproduct->image}}" alt="{{$lproduct->name}}">
                                    </a>
                                        </div>
                                        <div class="product-action-1">
                                    <!--<a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>-->
                                </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="new">{{ __('messages.new') }}</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                        <a href="#">{{$lproduct->category->name}}</a>
                                        </div>
                                        <h2><a href="product-details.html">{{$lproduct->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                    <span>€{{$lproduct->regular_price}}</span>
                                    <!--<span class="old-price">$245.8</span>-->
                                </div>
                                        <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$lproduct->id}}, '{{$lproduct->name}}', '{{$lproduct->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three (New added)-->
                </div>
                <!--End tab-content-->
            </div>
        </section>


        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>{{ __('messages.new') }}</span> {{ __('messages.arrivals') }}</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow bijelo" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center bijelo" id="carausel-6-columns-2">
                        @foreach($lproducts as $lproduct)
                    <div class="product-cart-wrap small hover-up bijelo">
                            <div class="product-img-action-wrap bijelo">
                                <div class="product-img product-img-zoom bijelo">
                                    <a href="{{route('product.details', ['slug'=>$lproduct->slug])}}">
                                        <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$lproduct->image}}" alt="{{$lproduct->name}}">
                                        <img class="hover-img" src="{{ asset('assets/imgs/products')}}/{{$lproduct->image}}" alt="{{$lproduct->name}}">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <!--<a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>-->
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">{{ __('messages.new') }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="product-details.html">{{$lproduct->name}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>€{{$lproduct->regular_price}}</span>
                                    <!--<span class="old-price">$245.8</span>-->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--End product-cart-wrap-2-->
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>{{ __('messages.featured_') }}</span> {{ __('messages._brands') }}</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-7.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-8.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-9.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-10.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-11.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-12.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-13.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-14.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-15.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
