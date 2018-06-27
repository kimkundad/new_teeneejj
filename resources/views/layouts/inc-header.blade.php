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
                              <a href="{{url('login')}}" class="dropdown-toggle" id="access_link">Sign in</a>

                          </div><!-- End Dropdown access -->
                          @else
                          <div class="dropdown dropdown-access">
                              <a href="#" class="dropdown-toggle" id="access_link">{{ substr(Auth::user()->name,0,15) }}</a>

                          </div><!-- End Dropdown access -->
                          @endif

                        </li>
                        <li><a href="{{url('wishlist')}}" id="wishlist_link">Wishlist</a></li>
                        <li><div id="google_translate_element"></div></li>
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
                          <a style="font-size: 15px;" href="{{url('/')}}">หน้าแรก </a>

                      </li>

                      <li>
                         <a style="font-size: 15px;" href="{{url('/presentation')}}">หมวดหมู่ </a>

                     </li>
                     <li>
                         <a style="font-size: 15px;" href="{{url('/map')}}">Map </a>

                     </li>
                     <li>
                       <a style="font-size: 15px;" href="{{url('/directions')}}">เส้นทางการเดินทาง </a>

                   </li>
                   <li>
                      <a style="font-size: 15px;" href="{{url('/article')}}">บทความ </a>

                  </li>

                  <li>
                     <a style="font-size: 15px;" href="{{url('/contact_us')}}">ติดต่อเรา  </a>

                 </li>



                    </ul>
                    <div id="google_translate_elementTWO"></div>
                </div><!-- End main-menu -->


            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->
