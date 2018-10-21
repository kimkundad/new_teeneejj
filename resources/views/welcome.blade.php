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
                    <h3 style="color:#444444; float:left;">{{ trans('message.title_search') }}</h3>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">

                                    <input type="text" class="form-control" id="firstname_booking" name="search" placeholder="{{ trans('message.title_search') }}..." required="">
                                </div>
                            </div>

                        </div><!-- End row -->
                        <!-- End row -->

                        <button class="btn_1 green" type="submit"><i class="icon-search"></i>{{ trans('message.btn_search') }}</button>
                    </div><!-- End rab -->
                   </form>


                </div>


</div>
</section>


<!-- End hero -->

<main >



<div class="container margin_60">

  <div class="main_title">
    <h2> <span>{{ trans('message.sub_title_home') }} </span> </h2>

    <br>
    <p style="font-size:24px;">{{ trans('message.sub_title_home_2') }}</p>
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
    <a href="{{url('all_shop')}}" class="btn_1 medium"> {{ trans('message.total_shop') }} ({{$shop_count}})  </a>
  </p>

  <br><hr>
  <br>
  <div class="main_title" style="margin-bottom: -40px;">
    <h2> <span style="font-size: 28px;"> รับซื้อสินค้าค้าง stock <!--{{ trans('message.sub_title_home_pro') }} --></span> </h2>

    <br>
    <p style="font-size:20px;">เราเสนอราคาที่เป็นธรรมและเป็นทางออกที่รวดเร็วสำหรับคุณ <!-- {{ trans('message.sub_title_home_2_pro') }}--></p>
  </div>

  <style>
  .thumbnail a>img, .thumbnail>img {
      border-radius: 5px 5px 0px 0px;
  }
  .thumbnail {
    border-radius: 5px;
    display: block;
    padding: 0px;
}
.thumbnail .caption {
    padding: 9px;
    color: #333;
}
.descript {
    /* height: 35px; */
    font-size: 15px;
    margin-left: 8px;
    margin-right: 8px;
    margin-top: 0px;
    margin-bottom: 5px;
    padding-bottom: 5px;
    line-height: 1.2em;
    /* margin-bottom: 12px !important; */
}
.descript a {
    color: #000;
    /* text-decoration: none; */
}
.descript-t {
    float: right;
    height: 40px;
}
.postMetaInline-authorLockup {
    display: table-cell;
    vertical-align: middle;
    font-size: 14px;
    line-height: 1.4;
    padding-left: 10px;
    text-rendering: auto;
}
.rating {
    margin: 1px 0 3px -3px;
    font-size: 15px;
}
.rating .voted {
    color: #F90;
}
  </style>


  <div class="row">



  <!--  @if($products)
    @foreach($products as $product)

    <div class="col-md-3 col-sm-6">
      <div class="thumbnail a_sd_move">
                          <div style="max-height: 184px; min-height: 184px; overflow: hidden; position: relative;">
                          <a href="{{url('product/'.$product->id)}}">
                          <img src="{{url('assets/image/product/'.$product->image_pro)}}">

                          </a></div>
                          <div class="caption" style="padding: 3px;">
                            <div class="descript bold" style="border-bottom: 1px dashed #dff0d8;">
                                <a href="{{url('product/'.$product->id)}}">{{$product->name_pro}}</a>
                            </div>


                            <div class="descript" style="height: 20px;">
                              <span style="color: #e03753; font-size: 14px; font-weight: 600;"> {{number_format($product->price)}} Baht</span>
                              <div class="descript-t">
                              <div class="postMetaInline-authorLockup">

                                                                <div class="rating">
                                    <i class="icon-star voted"></i>
                                    <i class="icon-star voted"></i>
                                    <i class="icon-star voted"></i>
                                    <i class="icon-star voted"></i>
                                    <i class="icon-star-empty"></i>

                                </div>

                              </div>
                              </div>
                            </div>

                          </div>
                        </div>
    </div>

    @endforeach
    @endif -->



  </div>



</div>
<!-- End container -->



<hr id="sent_myproduct">




<div class="white_bg" style="background: #f9f9f9;">
      <div class="container margin_60">

        <div class="row">

          <div class="col-md-6">

            <div class="feature_home" style="margin-bottom: 0px;">

                        <p style="font-size: 18px;">
                         <span  style="font-weight: 700; color: #e04f67;">สำหรับผู้ที่ต้องการเคลีย stock ที่ค้างอยู่</span><br /> สามารถติดต่อเรามาได้ทันที <br />เราเตรียมราคาที่เหมาะสมไว้ให้ <br />
                         <h3 style="margin-bottom: 0px; margin-top: 10px;"><span>และพร้อมจัดการสินค้าค้าง stock ให้ทันที</span><h3>
                       </p>
                       <br>

                       <style>
                       .input-group a {
                            background-color: #333;
                            color: #fff;
                            border-color: #333;
                        }
                        .input-group a:hover {
                             background-color: #e04f67;
                             color: #fff;
                             border-color: #e04f67;
                         }
                       </style>

                       <form id="add_subscribe" method="get" >
                          <div class="input-group">
                            <input type="text" id="subscribe_email" name="email" placeholder="Enter your Email or Phone number" class="form-control style-2" required>

                            <!-- Write here your end point -->
                            <span  class="input-group-btn">
                          <a  class="btn add_subscribe_btn" id="add_subscribe_btn"  style="margin-left:0;">ส่งอีเมลหรือเบอร์ติดต่อ</a >
                          </span>
                              </div>
                          <!-- /input-group -->
                        </form>


                  </div>

          </div>


          <div class="col-md-6">

            <div class=""  style="margin-bottom: 0px;">


                         <h2 style="font-weight: 700; font-size: 25px; margin-top: 0px; "><span>อยากจะได้สินค้าอะไร บอกเรา เราหาให้</span></h2>

                       <br>

                       <form  method="POST" action="sent_myproduct" enctype="multipart/form-data">

                                          {{ csrf_field() }}

                         <div class="input-group input-group-icon" >
                            <span class="input-group-addon">
                              <span class="icon"><i class="icon-cart "></i></span>
                            </span>
                            <input type="text" class="form-control" id="con_product" name="product" value="{{ old('product') }}" placeholder="สินค้าที่ต้องการ" required>
                          </div>


                          <div class="input-group input-group-icon" style="margin-top: 17px;">
                            <span class="input-group-addon">
                              <span class="icon"><i class="icon-mail-7"></i></span>
                            </span>
                            <input type="text" class="form-control" id="con_email" name="email" value="{{ old('email') }}" placeholder="อีเมล์ติดต่อกลับ" required>
                          </div>

                          <div class="input-group input-group-icon" style="margin-top: 17px;">
                            <span class="input-group-addon">
                              <span class="icon"><i class="icon-phone-3"></i></span>
                            </span>
                            <input type="text" class="form-control" id="con_tel" name="tel" value="{{ old('tel') }}" placeholder="เบอร์โทรติดต่อกลับ" required>
                          </div>
                          <br>
                          <button type="submit" id="add_message_btn" class="btn_1 add_message_btn">ส่งข้อมูล</button>
                        </form>


                  </div>


          </div>



          <div class="col-md-12">
            <br /><br />
            <img src="{{url('assets/image/ozeol-create.jpg')}}" class="img-responsive" />
          </div>

        </div>
      </div>
    </div>

<div class="white_bg">
  <div class="container margin_60">
    <div class="main_title">
      <h2> <span>{{ trans('message.website_shop') }}</span> </h2>
      <br>
      <p style="font-size:24px;">
        {{ trans('message.website_shop_sup') }}
      </p>
    </div>

    @if(trans('message.lang') == 'ไทย')

    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="{{url('category/'.$category2_2->id)}}"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="{{url('category/'.$category3_3->id)}}"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

    @elseif(trans('message.lang') == 'Eng')

    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name_en}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="{{url('category/'.$category2_2->id)}}"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name_en}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="{{url('category/'.$category3_3->id)}}"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name_en}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

    @else

    <div class="row add_bottom_45">
      <div class="col-md-4 other_tours">
        <ul>
          @if($category1)
            @foreach($category1 as $category1_1)
          <li><a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i>{{$category1_1->name_cn}}<span class="other_tours_price">{{$category1_1->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category2)
            @foreach($category2 as $category2_2)
          <li><a href="{{url('category/'.$category2_2->id)}}"><i class="{{$category2_2->icon}}"></i>{{$category2_2->name_cn}}<span class="other_tours_price">{{$category2_2->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
      <div class="col-md-4 other_tours">
        <ul>
          @if($category3)
            @foreach($category3 as $category3_3)
          <li><a href="{{url('category/'.$category3_3->id)}}"><i class="{{$category3_3->icon}}"></i>{{$category3_3->name_cn}}<span class="other_tours_price">{{$category3_3->options}}</span></a>
          </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

    @endif




    <!-- End row -->

    <hr>
    <div class="row">
            <div class="col-md-4 col-sm-6 text-center">
                <p>
                    <a href="{{url('history')}}"><img src="{{url('assets/img/1445871931-bus.jpg')}}" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                </p>
                <h4><span>{{trans('message.website_b1')}}</span> </h4>
                </div>
            <div class="col-md-4 col-sm-6 text-center">

                <p>
                    <a href="{{url('directions')}}"><img src="{{url('assets/img/1446997517-0rc002.jpg')}}" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                </p>
                <h4><span>{{trans('message.website_b2')}}</span></h4>

            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <p>
                    <a href="{{url('article')}}"><img src="{{url('assets/img/1446909591-JJMARKET 0311.jpg')}}" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                </p>
                <h4><span>{{trans('message.website_b3')}}</span> </h4>

            </div>

        </div>
    <!-- End row -->
  </div>
  <!-- End container -->
</div>
<!-- End white_bg -->

<section class="parallax-window" data-parallax="scroll" data-image-src="{{secure_url('assets/img/home_bg_1.jpg')}}" data-natural-width="1400" data-natural-height="470">
<div class="parallax-content-1 magnific">
    <div>
        <h3>{{ trans('message.sub_title_home') }}</h3>
        <p>{{ trans('message.website_video') }}</p>
        <a href="https://www.youtube.com/watch?v=NxiMRHXSO2E" class="video"><i class="icon-play-circled2-1"></i></a>
    </div>
</div>
</section>
<!-- End section -->

<div class="container margin_60">

  <div class="main_title">
    <h2>{{ trans('message.website_reason') }} <span>WHY US ?</span> </h2>
    <br>
    <p style="font-size:24px;">
       {{ trans('message.website_reason2') }}
    </p>
  </div>

  <div class="row">

              <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">
                  <div class="feature_home">
                      <i class="icon_set_1_icon-41"></i>
                      <h3><span>+ 8000</span> {{ trans('message.blog_1') }}</h3>
                      <p>

                           {{ trans('message.blog_1_sup') }}                    </p>
                      <a href="{{url('WHY_US')}}" class="btn_1 outline">{{ trans('message.read_more') }}</a>
                  </div>
              </div>

              <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: zoomIn;">
                  <div class="feature_home">
                      <i class="icon_set_1_icon-30"></i>
                      <h3><span>+1M</span> {{ trans('message.blog_2') }}</h3>
                      <p>
                           {{ trans('message.blog_2_sup') }}                    </p>
                      <a href="{{url('WHY_US')}}" class="btn_1 outline">{{ trans('message.read_more') }}</a>
                  </div>
              </div>

              <div class="col-md-4 wow zoomIn animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: zoomIn;">
                  <div class="feature_home">
                      <i class="icon_set_1_icon-57"></i>
                      <h3><span>H24 </span> Support</h3>
                      <p>
                           {{ trans('message.blog_3_sup') }}
                      </p>
                      <a href="{{url('contact_us')}}" class="btn_1 outline">{{ trans('message.read_more') }}</a>
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


@if ($message = Session::get('sent_myproduct_is_null'))
<script type="text/javascript">


    $(function(){
      // bind change event to select

      $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>กรอกข้อมูลไม่ครบค่ะ</h4> ",
          message: "กรอกข้อมูลให้ครบทุกช่องด้วยนะค่ะ เพื่อความสะดวกในการติดต่อกลับ. "
        },{
          // settings
          type: 'danger',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });


    });

</script>
@endif


@if ($message = Session::get('add_success_product'))
<script type="text/javascript">


    $(function(){
      // bind change event to select

      $.notify({
          // options
          icon: 'icon_set_1_icon-57',
          title: "<h4>ข้อความถูกส่งเรียบร้อยแล้ว</h4> ",
          message: "เจ้าหน้าที่จะรีบทำการติดต่อกลับไปหาท่านโดยไวที่สุด เมื่อเราพบสินค้าที่ท่านต้องการแล้ว. "
        },{
          // settings
          type: 'info',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });


    });

</script>
@endif



<script type="text/javascript">

 $('.add_subscribe_btn').click(function(e){
       e.preventDefault();
     //  var username = $('form#cutproduct input[name=id]').val();


     var $form = $(this).closest("form#add_subscribe");
     var formData =  $form.serializeArray();


     var email =  $form.find("#subscribe_email").val();

     //Checkemail(email);

     var emailFilter=/^.+@.+\..{2,3}$/;






     if (!(emailFilter.test(email))) {

      console.log(email);

            $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>รูปแบบ Email ของท่านไม่ถูกต้องค่ะ</h4> ",
          message: "กรุณาทำการตรวจสอบ Email ของท่านด้วย. "
        },{
          // settings
          type: 'danger',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });

           return false;
     }


       if(email){
         $.ajax({
           type: "POST",
           url: "{{url('add_subscribe')}}",
           headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
           data: "email="+email,
        success: function(data){

          console.log(data.data.status);

            if(data.data.status == 1001) {


               $("#subscribe_email").val('');


            $.notify({
          // options
          icon: 'icon_set_1_icon-57',
          title: "<h4>ข้อความถูกส่งเรียบร้อยแล้ว</h4> ",
          message: "เจ้าหน้าที่จะรีบทำการติดต่อกลับไปหาท่านโดยไวที่สุด เมื่อเราพบสินค้าที่ท่านต้องการแล้ว. "
        },{
          // settings
          type: 'info',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });




             } else {




 $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>อีเมลของท่านอยู่ในระบบอยู่แล้ว</h4> ",
          message: "email ของท่านอยุ่ในระบบอยู่แล้ว กรุณาติดต่อเราในช่องทางอื่น. "
        },{
          // settings
          type: 'danger',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });



             }
           },

           failure: function(errMsg) {
             alert(errMsg.Msg);
           }
         });
       }else{

         $.notify({
          // options
          icon: 'icon_set_1_icon-77',
          title: "<h4>กรอกข้อมูลไม่ครบค่ะ</h4> ",
          message: "กรอกข้อมูลให้ครบทุกช่องด้วยนะค่ะ เพื่อความสะดวกในการติดต่อกลับ. "
        },{
          // settings
          type: 'danger',
          delay: 5000,
          timer: 3000,
          z_index: 9999,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          animate: {
            enter: 'animated bounceInUp',
            exit: 'animated bounceOutDown'
          },
        });


       }

     });






 </script>

@stop('scripts')
