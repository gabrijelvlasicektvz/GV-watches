<div class="header-action-icon-2">
            <a href="{{route('shop.wishlist')}}">
                 <img class="svgInject" alt="wishlist" src="{{ asset('assets/imgs/theme/icons/icon-heart.svg') }}">
                 @if(Cart::instance('wishlist')->count()>0)
                 <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
                 @endif
            </a>
                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @foreach(Cart::instance('wishlist')->content() as $item)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="{{route('product.details', ['slug'=>$item->model->slug ?? 'default-slug'])}}"><img alt="{{$item->model->name}}" src="{{ asset('assets/imgs/products')}}/{{$item->model->image}}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="{{route('product.details', ['slug'=>$item->model->slug])}}">{{substr($item->model->name,0,20)}}...</a></h4>
                                                    <h4><span>{{$item->qty}} x</span>€{{$item->model->regular_price}}</h4>
                                                </div>
                                                <!-- <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div> -->
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-button bm">
                                                <a href="{{route('shop.wishlist')}}" class="outline">{{ __('messages.view_wishlist') }}</a>
                                            </div>
                                        </div>
                                    </div>
</div>
