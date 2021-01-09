<div id="preloader" style="display: none;">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

 <!-- Header================================================== -->
<header class="" id="set-head">
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong>086-551-7336</strong></div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                    <ul id="top_links">
                        <li>
                          @if (Auth::guest())
                          <div class="dropdown dropdown-access">
                              <a href="{{url('login')}}" class="dropdown-toggle" id="access_link">{{ trans('message.signin') }}</a>

                          </div><!-- End Dropdown access -->
                          @else
                          <div class="dropdown dropdown-access">
                            @if(Auth::user()->is_admin == 1)
                              <a href="{{url('admin/user')}}" class="dropdown-toggle" id="access_link">{{ substr(Auth::user()->name,0,15) }} controller</a>
                            @else
                            <a href="#" class="dropdown-toggle" id="access_link">{{ substr(Auth::user()->name,0,15) }}</a>
                            @endif

                          </div><!-- End Dropdown access -->
                          @endif

                        </li>
                        <li><a href="{{url('wishlist')}}" id="wishlist_link">{{ trans('message.wishlist') }}</a></li>
                        <li><a href="{{url('confirm_payment')}}" id="icon-dollar"><i class="icon-dollar"></i>{{ trans('message.payment') }}</a></li>
                        <li>Language : {{ trans('message.lang') }}</li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->

    <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3">
              <div id="logo">
                  <a href="{{url('/')}}"><img src="{{url('assets/img/logo.png')}}" height="54" alt="TEENEEJJ" data-retina="true" class="logo_normal"></a>
                  <a href="{{url('/')}}"><img src="{{url('assets/img/logo_sticky.png')}}" height="54" alt="TEENEEJJ" data-retina="true" class="logo_sticky"></a>
              </div>
          </div>
            <nav class="col-md-9 col-sm-9 col-xs-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{url('assets/img/logo_sticky.png')}}" height="54" alt="City tours" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                      <li>
                          <a style="font-size: 15px;" href="{{url('/')}}">{{ trans('message.index') }} </a>

                      </li>

                      <li>
                         <a style="font-size: 15px;" href="{{url('/presentation')}}">{{ trans('message.category') }} </a>

                     </li>
                     <li>
                         <a style="font-size: 15px;" href="{{url('/map')}}">{{ trans('message.map') }} </a>

                     </li>
                     <li>
                       <a style="font-size: 15px;" href="{{url('/directions')}}">{{ trans('message.directions') }} </a>

                   </li>
                   <li>
                      <a style="font-size: 15px;" href="{{url('/article')}}">{{ trans('message.article') }} </a>

                  </li>

                  <li>
                     <a style="font-size: 15px;" href="{{url('/contact_us')}}">{{ trans('message.contact_us') }}  </a>

                 </li>
                 <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Choose language <i class="icon-down-open-mini"></i></a>
                                <ul>

                                    <li><a href="{{ URL::to('change/th') }}">Thai language</a></li>
                                    <li><a href="{{ URL::to('change/en') }}">Englist language</a></li>
                                    <li><a href="{{ URL::to('change/ch') }}">Chaina language</a></li>

                                </ul>
                            </li>



                    </ul>
                    <br><br>
                    <div id="google_translate_elementTWO"></div>
                </div><!-- End main-menu -->



                <ul id="top_tools">

                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-basket-1"></i>Cart ({{count(array(Session::get('cart')))}}) </a>

                                @if(Session::get('cart') != null)

                                <?php
                                $cart = session()->get('cart');
                                $total = 0;
                                 ?>
                                <ul class="dropdown-menu" id="cart_items" >
                                  @foreach ($cart as $product_item)
                                    <li>
                                        <div class="image"><img src="{{url('assets/image/product/'.$product_item['image'])}}" ></div>
                                        <strong>
										<a href="#">{{$product_item['nama_product']}}</a>{{$product_item['qty']}}x ฿{{number_format($product_item['price'])}} </strong>
                                        <a href="{{url('/deleteCart/'.$product_item['id'])}}" class="action"><i class="icon-trash"></i></a>
                                        <?php
                                          $total += ($product_item['qty'] * $product_item['price']);
                                         ?>
                                    </li>
                                  @endforeach

                                    <li>
                                        <div>Total: <span>฿{{number_format($total)}}.00</span></div>
                                        <a href="{{url('cart')}}" class="button_drop">Go to cart</a>
                                        <a href="{{url('payment')}}" class="button_drop outline">Check out</a>
                                    </li>
                                </ul>
                                @endif

                            </div><!-- End dropdown-cart-->
                        </li>
                    </ul>


            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->
