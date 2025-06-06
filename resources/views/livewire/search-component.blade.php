<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
  <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">{{ __('messages.home') }}</a>
                    <span></span>{{ __('messages.shop') }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p>{{ __('messages.we_found') }} <strong class="text-brand"> {{$products->total()}} </strong>{{ __('messages.items_for_you') }}</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>{{ __('messages.show') }}:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span>{{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$pageSize==10 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(10)">10</a></li>
                                            <li><a class="{{$pageSize==15 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{$pageSize==20 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(20)">20</a></li>
                                            <li><a class="{{$pageSize==25 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{$pageSize==30 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(30)">30</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>{{ __('messages.sort_by') }}</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span>
                                                @switch($orderBy)
                                                    @case('Price: Low to High') {{ __('messages.price_low_high') }} @break
                                                    @case('Price: High to Low') {{ __('messages.price_high_low') }} @break
                                                    @case('Sort by Newness') {{ __('messages.sort_by_newness') }} @break
                                                    @default {{ __('messages.default_sorting') }}
                                                @endswitch
                                                <i class="fi-rs-angle-small-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy == 'Default Sorting' ? 'active' : '' }}" href="#" wire:click.prevent="changeOrderBy('Default Sorting')">{{ __('messages.default_sorting') }}</a></li>
                                            <li><a class="{{ $orderBy == 'Price: Low to High' ? 'active' : '' }}" href="#" wire:click.prevent="changeOrderBy('Price: Low to High')">{{ __('messages.price_low_high') }}</a></li>
                                            <li><a class="{{ $orderBy == 'Price: High to Low' ? 'active' : '' }}" href="#" wire:click.prevent="changeOrderBy('Price: High to Low')">{{ __('messages.price_high_low') }}</a></li>
                                            <li><a class="{{ $orderBy == 'Sort by Newness' ? 'active' : '' }}" href="#" wire:click.prevent="changeOrderBy('Sort by Newness')">{{ __('messages.sort_by_newness') }}</a></li>
                                        </ul>
                                    </div>
</div>

                            </div>
                        </div>
                        <div class="row product-grid-3">
                                @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details', ['slug'=>$product->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                                <img class="hover-img" src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                              <!--<span class="hot">Hot</span>-->
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                        <a href="#">{{$product->category->name}}</a>
                                        </div>
                                        <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>€{{$product->regular_price}}</span>
                                            <!-- <span class="old-price">$245.8</span> -->
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', '{{$product->regular_price}}')"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{$products->links()}}
                            <!-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">{{ __('messages.category') }}</h5>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                <li><a href="{{ route('product.category', ['slug'=>$category->slug] )}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">{{ __('messages.new_products') }}</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($nproducts as $nproduct)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset('assets/imgs/products')}}/{{$nproduct->image}}" alt="{{$nproduct->name}}">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{route('product.details', ['slug'=>$nproduct->slug])}}">{{$nproduct->name}}</a></h5>
                                <p class="price mb-0 mt-5">€{{$nproduct->regular_price}}</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--     <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="assets/imgs/banner/banner-11.jpg" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>
</div>

