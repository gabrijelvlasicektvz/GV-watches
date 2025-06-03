@php
use Illuminate\Support\Str;
@endphp
<main class="main">
<style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
        .wishlisted{
            background-color: #1c1f2b !important;
            border: 1px solid transparent !important;
        }
        .wishlisted i{
            color: #ffffff !important;
        }
    </style>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">{{ __('messages.home') }}</a>
                <span></span>{{ __('messages.products') }}
                <span></span>{{ __('messages.product_details') }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                  <div class="product-image-slider">
                                      <figure class="border-radius-10">
                                          <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                      <figure class="border-radius-10">
                                      <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                      <figure class="border-radius-10">
                                      <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                      <figure class="border-radius-10">
                                      <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                      <figure class="border-radius-10">
                                      <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                      <figure class="border-radius-10">
                                      <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                      <figure class="border-radius-10">
                                      <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                      </figure>
                                  </div>
                                    <!-- THUMBNAILS -->
                                  <div class="slider-nav-thumbnails pl-15 pr-15">
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image"></div>
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-4.jpg')}}" alt="product image"></div>
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-5.jpg')}}" alt="product image"></div>
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image"></div>
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-7.jpg')}}" alt="product image"></div>
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image"></div>
                                      <div><img src="{{ asset('assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image"></div>
                                  </div>
                                </div>
                                <!-- End Gallery -->
                              <div class="social-icons single-share">
                                  <ul class="text-grey-5 d-inline-block">
                                      <li><strong class="mr-10">{{ __('messages.share_this') }}:</strong></li>
                                      <li class="social-facebook"><a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                      <li class="social-twitter"> <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                      <li class="social-instagram"><a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                      <li class="social-linkedin"><a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                  </ul>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                @php
                                   $witems=Cart::instance('wishlist')->content()->pluck('id');
                                @endphp
                              <div class="detail-info">
                                  <h2 class="title-detail">{{$product->name}}</h2>
                                  <div class="product-detail-rating">
                                      <div class="pro-details-brand">
                                          <span>{{ __('messages.brands') }}: <a href="{{ route('product.category', ['slug'=>$product->category->slug] )}}">{{$product->category->name}}</a></span>
                                      </div>
                                      <div class="product-rate-cover text-end">
                                          <div class="product-rate d-inline-block">
                                              <div class="product-rating" style="width:90%">
                                              </div>
                                          </div>
                                          <span class="font-small ml-5 text-muted"> ({{ $reviews->count() }} {{ Str::plural('review', $reviews->count()) }})</span>
                                      </div>
                                  </div>
                                  <div class="clearfix product-price-cover">
                                      <div class="product-price primary-color float-left">
                                          <ins><span class="text-brand">€{{$product->regular_price}}</span></ins>
                                          <!-- <ins><span class="old-price font-md ml-15">$200.00</span></ins> -->
                                          <!-- <span class="save-price  font-md color3 ml-15">25% Off</span> -->
                                      </div>
                                  </div>
                                  <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                  <div class="short-desc mb-30">
                                      <p>{{$product->short_description}}</p>
                                  </div>
                                  <!-- <div class="product_sort_info font-xs mb-30">
                                      <ul>
                                          <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                          <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                          <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                      </ul>
                                  </div> -->

                                  <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                  <div class="detail-extralink">
                                      <div class="detail-qty border radius">
                                          <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                          <span class="qty-val">1</span>
                                          <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                      </div>
                                      <div class="product-extra-link2">
                                      <button type="button" class="button button-add-to-cart" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">{{ __('messages.add_to_cart') }}</button>
                                      @if($witems->contains($product->id))
                                            <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{ $product->id}})"><i class="fi-rs-heart"></i></a>
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{ $product->id}}, '{{ $product->name }}', {{ $product->regular_price }})"><i class="fi-rs-heart"></i></a>
                                            @endif
                                          <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                      </div>
                                  </div>
                                  <ul class="product-meta font-xs color-grey mt-50">
                                      <li class="mb-5">{{ __('messages.sku') }}: <a href="#">{{$product->SKU}}</a></li>
                                      <li>{{__('messages.availability') }}:<span class="in-stock text-success ml-5">{{$product->quantity}} {{ __('messages.items_in_stock') }}</span></li>
                                  </ul>
                              </div>
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">{{ __('messages.description') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">{{ __('messages.reviews') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                    <p>{{$product->description}}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    @foreach($reviews as $review)
                                    <div class="single-comment">
                                        <strong>{{ $review->user->name }}</strong>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: {{ $review->rating * 20 }}%"></div>
                                        </div>
                                        <p>{{ $review->comment }}</p>
                                        <small>{{ $review->created_at->format('d.m.Y H:i') }}</small>
                                    </div>
                                @endforeach
                                    <!--comment form-->
                                    @auth
                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <label>{{ __('messages.rating') }}</label>
                                    <input type="number" name="rating" min="1" max="5" required>

                                    <label>{{ __('messages.comment') }}</label>
                                    <textarea name="comment" required></textarea>

                                    <button class="button button-add-to-cart" type="submit">{{ __('messages.submit_review') }}</button>
                                </form>
                                @else
                                    <p><a href="{{ route('login') }}">{{ __('messages.login_') }}</a> {{ __('messages.to_write_review') }}</p>
                                @endauth
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">{{ __('messages.related_products') }}</h3>
                            </div>
                            <div class="col-12">
                              <div class="row related-products">
                                  @foreach ($rproducts as $rproduct)
                                  <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                      <div class="product-cart-wrap small hover-up">
                                          <div class="product-img-action-wrap">
                                              <div class="product-img product-img-zoom">
                                                  <a href="{{route('product.details', ['slug'=>$rproduct->slug])}}" tabindex="0">
                                                      <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$rproduct->image}}" alt="{{$rproduct->name}}">
                                                      <img class="hover-img" src="{{ asset('assets/imgs/products')}}/{{$rproduct->image}}" alt="{{$rproduct->name}}">
                                                  </a>
                                              </div>
                                              <div class="product-action-1">
                                                  <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                  <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                  <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                              </div>
                                              <div class="product-badges product-badges-position product-badges-mrg">
                                                    <!--<span class="hot">Hot</span>-->
                                              </div>
                                          </div>
                                          <div class="product-content-wrap">
                                              <h2><a href="{{route('product.details', ['slug'=>$rproduct->slug])}}" tabindex="0">{{$rproduct->name}}</a></h2>
                                              <div class="rating-result" title="90%">
                                                  <span>
                                                  </span>
                                              </div>
                                              <div class="product-price">
                                                  <span>€{{$rproduct->regular_price}}</span>
                                                  <!-- <span class="old-price">$245.8</span> -->
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
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
                </div>
            </div>
        </div>
    </section>
</main>
