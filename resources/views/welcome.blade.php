@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<section id="search_container" style="background:#4d536d url(assets/img/bg_login.png) no-repeat center top;">
<div id="search">


                <div class="tab-content">

                    <form name="search" method="GET" action="{{url('search')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="tab-pane active" id="tours">
                    <h3 style="color:#444444; float:left;">ค้นหาสิ่งที่ต้องการ ใน ตลาดนัดสวนจตุจักร</h3>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">

                                    <input type="text" class="form-control" id="firstname_booking" name="search" placeholder="ค้นหาสิ่งที่ต้องการในจตุจักร..." required="">
                                </div>
                            </div>

                        </div><!-- End row -->
                        <!-- End row -->

                        <button class="btn_1 green" type="submit"><i class="icon-search"></i>Search now</button>
                    </div><!-- End rab -->
                   </form>


                </div>


</div>
</section>


<!-- End hero -->

<main >
<div class="container margin_60">

  <div class="main_title">
    <h2>ตลาดนัดสวน <span>จตุจักร</span> </h2>
    <br>
    <p style="font-size:24px;">10 ร้านเสื้อยืดในจตุจักร ที่ยังไงก็ต้องเสียตัง</p>
  </div>

  <div class="row">


    @if($shop)
      @foreach($shop as $shops)

    <div class="col-md-3 col-sm-6 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;  padding-right: 6px; padding-left: 6px;">

      @if($set_point<=3)
      <div class="ribbon_3 popular"><span>Recommend</span></div>
      @else
      <div class="ribbon_3"><span>Popular</span></div>
      @endif

      <div class="tour_container">
        <div class="img_container">
          <a href="{{url('shop/'.$shops->id)}}">
            <img src="{{url('assets/image/cusimage/'.$shops->image)}}" class="img-responsive" alt="Image">
            <div class="short_info">
              {{$shops->name}}
            </div>
          </a>

        </div>
        <div class="wishlist">
          <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

                      <input class="user_id form hide" type="text" name="id" value="{{$shops->id}}" />
                          <a class="tooltip_flip tooltip-effect-1" >
                              +<span class="tooltip-content-flip">
                              <span class="tooltip-back">Add to wishlist</span></span></a>
          </form>


        </div>


      </div>
      <!-- End box tour -->
    </div {{$set_point++}}>
    <!-- End col-md-4 -->
      @endforeach
    @endif

  </div>
  <!-- End row -->
  <br>
  <p class="text-center nopadding">
    <a href="#" class="btn_1 medium">เข้าชมแผงค้าทั้งหมด ({{$shop_count}})  </a>
  </p>
</div>
<!-- End container -->

<div class="white_bg">
  <div class="container margin_60">
    <div class="main_title">
      <h2>เว็บไซต์ <span>ที่นี่เจเจ</span> </h2>
      <br>
      <p style="font-size:24px;">
        รวบรวมร้านค้าที่คัดเลือดมาแล้วอย่างดี จากทั้งหมด 8,000 ร้านค้า
      </p>
    </div>
    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="#"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="#"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="#"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>
    <!-- End row -->

    <hr>
    <div class="row">
            <div class="col-md-4 col-sm-6 text-center">
                <p>
                    <a href="{{url('history')}}"><img src="{{url('assets/img/1445871931-bus.jpg')}}" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                </p>
                <h4><span>ประวัติความเป็นมาประวัติ</span> </h4>
                </div>
            <div class="col-md-4 col-sm-6 text-center">

                <p>
                    <a href="{{url('directions')}}"><img src="{{url('assets/img/1446997517-0rc002.jpg')}}" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                </p>
                <h4><span>การเดินทางมายังตลาดนัดจตุจักร</span></h4>

            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <p>
                    <a href="{{url('article')}}"><img src="{{url('assets/img/1446909591-JJMARKET 0311.jpg')}}" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                </p>
                <h4><span>บทความน่ารู้</span> </h4>

            </div>

        </div>
    <!-- End row -->
  </div>
  <!-- End container -->
</div>
<!-- End white_bg -->

<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
<div class="parallax-content-1 magnific">
    <div>
        <h3>ตลาดนัดสวนจตุจักร</h3>
        <p>แหล่งรวบรวมสินค้าสำหรับคนทุกเพศทุกวัย เช่น เสื้อผ้า เครื่องประดับ สินค้าพื้นเมือง เครื่องจักสาน เฟอร์นิเจอร์ ไปจนถึงสัตว์เลี้ยง นอกจากนี้ยังจัดบริเวณเฉพาะสำหรับร้านค้าพันธุ์ไม้ดอกไม้ประดับชนิดต่างๆ ที่ใหญ่ที่สุดแห่งหนึ่งในกรุงเทพมหานคร</p>
        <a href="https://www.youtube.com/watch?v=NxiMRHXSO2E" class="video"><i class="icon-play-circled2-1"></i></a>
    </div>
</div>
</section>
<!-- End section -->

<div class="container margin_60">

  <div class="main_title">
    <h2>เหตุผลที่ต้องเป็นเรา - <span>WHY US ?</span> </h2>
    <br>
    <p style="font-size:24px;">
      มั่นใจได้ว่าท่านจะได้รับข้อมูลล่าสุดจากเราตลอดเวลา
    </p>
  </div>

  <div class="row">

              <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">
                  <div class="feature_home">
                      <i class="icon_set_1_icon-41"></i>
                      <h3><span>+ 8000</span> แผงค้า</h3>
                      <p>

                           จากข้อมูลนักท่องเที่ยวต่างชาติปี 2558 มีประมาณ 25 ล้านคน มีประมาณ 70% ที่มาท่องเที่ยวที่จตุจักร โดยรวมกันแล้ว ทั้งนักท่องเที่ยวไทย                    </p>
                      <a href="{{url('WHY_US')}}" class="btn_1 outline">อ่านต่อ</a>
                  </div>
              </div>

              <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: zoomIn;">
                  <div class="feature_home">
                      <i class="icon_set_1_icon-30"></i>
                      <h3><span>+1M</span> สำหรับผู้เข้าชม</h3>
                      <p>
                           เรามีข้อมูลของแผงค้าของตลาดนัดจตุจักร ที่มีการอัพเดทข้อมูลใหม่ทุกๆสัปดาห์ และเลือกข้อมูลที่ดีที่สุดมาให้กับท่านได้เลือกชมกัน เวลาเ                    </p>
                      <a href="{{url('WHY_US')}}" class="btn_1 outline">อ่านต่อ</a>
                  </div>
              </div>

              <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: zoomIn;">
                  <div class="feature_home">
                      <i class="icon_set_1_icon-57"></i>
                      <h3><span>H24 </span> Support</h3>
                      <p>
                           หากมีข้อผิดพลาดประการใด หรือคำแนะนำเกี่ยวกับเว็บไซต์นี้ สามารถแจ้งในส่วนของ Contact ในหน้าติดต่อนี้ได้เลยครับ
                      </p>
                      <a href="{{url('contact_us')}}" class="btn_1 outline">อ่านต่อ</a>
                  </div>
              </div>

          </div>
  <!--End row -->



</div>
<!-- End container -->
</main>
<!-- End main -->







@endsection

@section('scripts')



@stop('scripts')
