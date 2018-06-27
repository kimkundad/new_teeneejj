@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@stop('stylesheet')
@section('content')

<style>
#map {
  width: 100%;
  height: 450px;
}
</style>

<section class="parallax-window" style="min-height: 270px;" data-parallax="scroll" data-image-src="{{url('assets/image/cusimage/1447225236-1.jpg')}}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8" style="margin-top:20px;">



                    <span class="rating">

<?php
for($i=1;$i <= $objs->rating;$i++){
?>

                          <i class="icon-star voted"></i>
  <?php
  }
  ?>

<?php
$total = 5;
$total -= $objs->rating;

for($i=1;$i <= $total;$i++){
?>

                         <i class="icon-star-empty"></i>
  <?php
  }
  ?>
                        </span>



                    <h1>{{$objs->names}}</h1>
                    <span>{{$objs->keyword}}</span>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main" class="hotel">
                        ยอดการเข้าชม <span><sup></sup>{{number_format($objs->view)}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <div id="position">
        <div class="container">
                    <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('category/'.$objs->id_c)}}">{{$objs->name_c}}</a></li>
                    <li>{{$objs->names}}</li>
                    </ul>
        </div>
</div>


<div class="collapse in" id="collapseMap" aria-expanded="false">

        <div id="map" class="map" >

        </div>
    </div>


            <div class="container margin_60">



              <div class="row">
                      <div class="col-md-8" id="single_tour_desc">

                          <p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="true" aria-controls="collapseMap">View on map</a></p><!-- Map button for tablets/mobiles -->



              <div class="row magnific-gallery">




              <div class="col-md-6 col-sm-6" style="padding-right: 3px;">

                    <a class="example-image-link" href="{{url('assets/image/cusimage/'.$gallery1[0]->image)}}" data-lightbox="example-set"><img class="img-responsive example-image" src="{{url('assets/image/cusimage/'.$gallery1[0]->image)}}" alt=""></a>
                     </div>

                     <div class="col-md-6 col-sm-6" style="padding-left: 3px;">

                   <a class="example-image-link" href="{{url('assets/image/cusimage/'.$gallery1[1]->image)}}" data-lightbox="example-set"><img class="img-responsive example-image" src="{{url('assets/image/cusimage/'.$gallery1[1]->image)}}" alt=""></a>
                     </div>



              <div class="col-md-4 col-sm-4" style="padding-right: 0px; padding-top:5px">

                    <a class="example-image-link" href="{{url('assets/image/cusimage/'.$gallery1[2]->image)}}" data-lightbox="example-set"><img class="img-responsive example-image" src="{{url('assets/image/cusimage/'.$gallery1[2]->image)}}" alt=""></a>
                     </div>

                     <div class="col-md-4 col-sm-4" style="padding-left: 6px; padding-right:6px; padding-top:5px; ">

                   <a class="example-image-link" href="{{url('assets/image/cusimage/'.$gallery1[3]->image)}}" data-lightbox="example-set"><img class="img-responsive example-image" src="{{url('assets/image/cusimage/'.$gallery1[3]->image)}}" alt=""></a>
                     </div>


                     <div class="col-md-4 col-sm-4" style="padding-left: 0px; padding-top:5px">

                    <a class="example-image-link" href="{{url('assets/image/cusimage/'.$gallery1[4]->image)}}" data-lightbox="example-set"><img class="img-responsive example-image" src="{{url('assets/image/cusimage/'.$gallery1[4]->image)}}" alt=""></a>
                     </div>



              </div>















                          <hr>

              <div class="row magnific-gallery add_bottom_60 ">

                <div class="col-md-12">
                    <h3>สินค้าใหม่ </h3>
                </div>
                        @if($gallery2)
                          @foreach($gallery2 as $gallery22)


                                 <div class="col-md-4 " style=" padding-right: 5px; padding-left: 5px;">
                                   <a class="example-image-link" href="{{url('assets/image/cusimage/'.$gallery22->image)}}" data-lightbox="example-set">
                                     <img class="img-responsive styled" style="margin-top: 10px;" src="{{url('assets/image/cusimage/'.$gallery22->image)}}" alt="">
                                   </a>
                                 </div>

                                 @endforeach
                               @endif



              </div>
                          <hr>

                          <div class="row">
                              <div class="col-md-3">
                                  <h3>รายละเอียด</h3>
                              </div>

                              <div class="col-md-9">
                                  <p style="font-size:16px;" align="justify">
                                    {!! $objs->details !!}
                                  </p>
                                  <h4>ข้อมูลการติดต่อ</h4>
                                  <p><b>ที่อยู่ร้าน :</b> {{$objs->keyword}} </p>
                                  <div class="row">
                                      <div class="col-md-6 col-sm-6">
                                          <ul class="list_ok">
                                              <li><i class="fa icon-desktop"></i> : {{$objs->website}}</li>
                                              <li><i class="fa icon-mail-2"></i> : {{$objs->email}}</li>
                                              <li><i class="fa icon-phone"></i> : {{$objs->phone}}</li>
                                              <li><i class="fa icon-facebook"></i> : {{$objs->facebook}}/</li>

                                          </ul>
                                      </div>
                                      <div class="col-md-6 col-sm-6">
                                          <ul class="list_ok">
                                              <li><i class="fa icon-comment-empty"></i> Line : {{$objs->line_id}}</li>
                                              <li><i class="fa icon-instagramm"></i> : {{$objs->instagram}}</li>


                                          </ul>
                                      </div>



                                  </div><!-- End row  -->

              <hr>

              <div class="row">
                <div class="col-md-3">
                                  <h3>ราคา</h3>
                              </div>

                <div class="col-md-9">
                <h4>{{$objs->startprice}} - {{$objs->endprice}} บาท</h4>
                  </div>
              </div>




              <hr>


                                  <div class="row">
                                      <div class="col-md-4" style="margin-top:-12px; width: 33.33333333%; float:left;">
                                  <h4>Social share</h4>
                              </div>
                                      <div class="col-md-8" >
                                        <div class="fb-like" data-href="https://www.teeneejj.com/shop/44" data-layout="button_count" data-action="recommend" data-size="small" data-show-faces="true" data-share="true"></div>
                                      </div>


                                       </div>



                              </div><!-- End col-md-9  -->
                          </div><!-- End row  -->











                          <hr>

                          <div class="row">
                            <div class="col-md-12">
                              <h4>คุณอาจจะสนใจ</h4>
                            </div>


                            <style>
                            .descript-t {
                                float: right;
                                height: 40px;
                            }
                            .rating {
                                  font-size: 16px;
                              }
                            </style>





                            @if($ran)
                            @foreach($ran as $rans)

                            <div class="col-md-4">

                              <div class="thumbnail a_sd_move">
                                        <div style="max-height: 184px; overflow: hidden; position: relative;">
                                        <a href="{{url('shop/'.$rans->id)}}">

                                        <img src="{{url('assets/image/cusimage/'.$rans->image)}}" alt="{{$rans->name}}">


                                        </a></div>
                                        <div class="caption" style="padding: 3px;">
                                          <div class="descript bold">
                                              <a href="{{url('shop/'.$rans->id)}}">Se-w-up</a>
                                          </div>
                                          <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                                            เสื้อผ้า/กางเกง                           </div>

                                          <div class="descript" style="height: 20px;">
                                            <span style="color: #777; font-size: 12px;"><i class="fa fa-heart " style="color:#e04f67"></i> {{$rans->view}}</span>
                                            <div class="descript-t">
                                            <div class="postMetaInline-authorLockup">




                                              <div class="rating">

                                                <?php
                                                for($i=1;$i <= $rans->rating;$i++){
                                                ?>

                                                                          <i class="fa fa-star voted"></i>
                                                  <?php
                                                  }
                                                  ?>

                                                <?php
                                                $total = 5;
                                                $total -= $rans->rating;

                                                for($i=1;$i <= $total;$i++){
                                                ?>

                                                                         <i class="fa fa-star-o"></i>
                                                  <?php
                                                  }
                                                  ?>
                                              <span style="color: #777; font-size: 12px;">{{$rans->rating}}.0</span>
                                              </div>




                                                                  <!--            <div class="rating">
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star voted"></i>
                                                  <i class="fa fa-star-o"></i>
                                                  <span style="color: #777; font-size: 12px;">4.0</span>
                                              </div> -->

                                            </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>

                            </div>



                            @endforeach
                            @endif









                          </div>


                          <hr>




                      </div><!--End  single_tour_desc-->
                      <style type="text/css">
                      tr.other_tours1 td a {


                          color: #333;
                          text-decoration:none;
                      }
                      tr.other_tours1 td a:hover{color:#e04f67}
                      </style>
                      <aside class="col-md-4">
                        <p class="hidden-sm hidden-xs">
                						<a class="btn_map collapsed" data-toggle="collapse" href="#collapseMap" aria-expanded="true" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                					</p>
              <div class="box_style_1 expose" style="margin-bottom: 10px">


                       <form id="cutproduct2" class="typePay2 " novalidate="novalidate" action="" method="post" role="form">

                          <input class="form hide" type="text" name="id" value="{{$objs->id_p}}">
                      <!--    <a type="submit" class="btn_full_outline" style="text-decoration:none;" href="#"><i class=" icon-heart"></i> Add to whislist</a> -->
                          <a type="submit" onclick="$(this).closest('form').submit()" class="btn_full_outline" style="text-decoration:none;"><i class=" icon-heart"></i> Add to whislist</a>

                      </form>


                      </div>


                          <div class="box_style_1">



                      <div class="widget">
                                  <form name="search" method="post" action="search">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="search" placeholder="Search...">
                                      <span class="input-group-btn">
                                      <button class="btn btn-default" type="submit" style="margin-left:0;"><i class="icon-search"></i></button>
                                      </span>
                                  </div><!-- /input-group -->
                              </form>
                              </div>
                <br>

                <table class="table table_summary">
                  <tbody>
                    <tr>
                      <th colspan="2"><h5><b>Search Category</b></h5></th>
                      </tr><tr>
                  </tr>
                </tbody>
            <tbody>

              @if($cat)
                @foreach($cat as $category1_1)

              <tr class="other_tours1">
                  <td style="width: 70%;">
                      <a href="{{url('category/'.$category1_1->id)}}"><i class="{{$category1_1->icon}}"></i> {{$category1_1->name}}</a>
                  </td>
                  <td class="text-right">
                      <span class="other_tours_price"><a href="category-25">{{$category1_1->options}}</a>
                      </span>
                  </td>
              </tr>
                @endforeach
              @endif


               </tbody>
            </table>


                  </div>






                      </aside>
                  </div>





</div>

<style>
.candidate-info{
  padding-top: 10px;
  text-align: center;
}
</style>


@endsection

@section('scripts')


<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([13.800658, 100.5505501], 17);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


  L.marker([{{$objs->latitude}}, {{$objs->longitude}}]).bindPopup('<div style="text-align: center;"><a href="{{url('shop/'.$objs->id_p)}}"><img src="{{url('assets/image/cusimage/'.$objs->image)}}" style="width:130px"></a></div><div class="candidate-info"><a href="{{url('shop/'.$objs->id_p)}}">{{$objs->names}}<br>({{$objs->name_c}})</a></div>').addTo(map).openPopup();


  setTimeout(() => {
      document.getElementById("collapseMap").classList.remove("in");
  }, 500);

	</script>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=164123417449680&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


  <script type="text/javascript">

      $('form#cutproduct2').on('submit',function(e){
            e.preventDefault();
            var username = $('form#cutproduct2 input[name=id]').val();

            if(username){
              $.ajax({
                type: "POST",
                async: true,
                url: "{{url('add_wishlist')}}",
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: "id="+username,
                dataType: "json",
             success: function(json){
               if(json.status == 1001) {


                 $.notify({
                  // options
                  icon: '',
                  title: "<h4>เพิ่มรายการที่ชอบ สำเร็จ</h4> ",
                  message: "ท่านสามารถเข้า wishlist เพื่อดูรายการทั้งหมดของท่าน . "
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
                    icon: '',
                    title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                    message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
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
                icon: '',
                title: "<h4>เพิ่มรายการที่ชอบ ไม่สำเร็จ</h4> ",
                message: "ท่านต้องทำการ Login เพื่อเข้าสู่ระบบก่อนเพิ่มรายการที่ชอบ . "
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
