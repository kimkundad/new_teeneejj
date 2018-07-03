@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')


<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
              <div class="animated fadeInDown">
                <h1>{{ trans('message.directions') }}</h1>
                <p>{{ trans('message.directions_sup') }}</p>
              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">{{ trans('message.directions') }}</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

    <div class="main_title">
        <h2><span>{{ trans('message.directions') }} </span></h2>
        <br>
        <p>{{ trans('message.directions_sup_1') }}</p>
    </div>

    <div class="row add_bottom_45">

      @if(trans('message.lang') == 'ไทย')

      <div class="col-md-10 col-md-offset-1">
        <h3>การเดินทางมา <span>ตลาดนัดสวนจตุจักร</span></h3>
        <p><strong>การเดินทาง</strong> มีหลายรูปแบบทั้งรถยนต์ส่วนตัวซึ่งต้องนำไปจอดที่ลานจอดรถตลาดนัดจตุจักรหรือ Park Ride และมีรถรับส่งระหว่างลานจอดรถกับตลาดนัดจตุจักร (ประตู 2)
             หรือนั่งรถประจำทางซึ่งมีหลายสายผ่าน และที่สะดวกมากก็คือโดยสารลงที่สถานีหมอชิตหรือรถไฟฟ้ามหานครรถไฟฟ้าใต้ดินลงที่ สถานีกำแพงเพชรนอกจากนี้ก็ยังมีรถแท็กซี่ และรถตู้หลายสายให้บริการ
             หมายเลขรถประจำทางที่ผ่านตลาดนัดจตุจักร
					</p>
          <p>
  					<strong>รถไฟฟ้า BTS / รถไฟฟ้าใต้ดิน</strong>  ถ้านั่งรถไฟฟ้า BTS ให้ลงที่สถานีหมอชิต ใข้ทางออกที่ 1 หรือถ้านั่งรถไฟฟ้าใต้ดินก็มาขึ้นที่สถานีกำแพงเพชร
               ใช้ทางเข้าออกหมายเลข 2 (โครงการ 1, 2 และโซนหนังสือ) หรือสถานีสวนจตุจักร ใช้ทางเข้าออกหมายเลข 1 (ใกล้กับโครงการ 5, 6 และ 7)
  					</p>
         <h4>หมายเลขรถประจำทางที่ผ่าน <span>ตลาดนัดจตุจักร</span></h4>
         <hr>

         <h4><span>ป้ายรถประจำทางหน้าสวนจตุจักร (ถ.พหลโยธิน)</span></h4>
         <p>รถธรรมดา : 3, 8, 26, 27, 28, 29, 34, 38, 39, 44, 52, 59, 63, 77, 90, 96, 104, 108, 122, 126, 134, 136, 138, 145, 182, 188</p>
         <p>รถปรับอากาศ : ปอ.3, ปอ.28, ปอ.29, ปอ.34, ปอ.39, ปอ.44, ปอ.59, ปอ.63, ปอ.77, ปอ.104, ปอ.126, ปอ.134, ปอ.138, ปอ.145, ปอ.157, ปอ.177, ปอ.502, ปอ.503, ปอ.509, ปอ.510, ปอ.512, ปอ.517, ปอ.524, ปอ.529</p>

         <h4><span>ป้ายรถประจำทางหน้าจตุจักร เดย์ แอนด์ ไนท์ หรือ ตลาดนัดจตุจักร ประตู 1 (ถ.กำแพงเพชร 2)</span></h4>
         <p>รถธรรมดา : 26, 77, 96, 104, 122, 134, 136, 138, 145, 157, 182</p>
         <p>รถปรับอากาศ : ปอ.77, ปอ.134, ปอ.138, ปอ.145, ปอ.157, ปอ.509, ปอ.517, ปอ.529, ปอ.536</p>
         <p>พิกัด GPS : 13.799847, 100.549391</p>

         <h4><span>เวลาเปิด-ปิด ตลาดนัดจตุจักร</span></h4>
         <p>วันพุธ - วัพฤหัสสบดี ตลาดนัดต้นไม้ เวลา 05.00 - 18.00 น.</p>
         <p>วันศุกร์ ตลาดนัดเซรามิค เวลา 08.00 - 21.00 น.</p>
         <p>วันเสาร์ - อาทิตย์ ตลาดนัดทั่วไป เวลา 08.00 - 21.00 น.</p>
        <br>
         <h4><span>เบอร์โทร Call Center : 1690 กด 6</span></h4>
         <hr>
         <h3><span>แผนที่การเดินทางรถไฟฟ้า BTS / รถไฟฟ้าใต้ดิน</span></h3>
         <img alt="map" class="img-responsive" src="{{url('assets/image/JJ_Isometric_Map_artwork1.jpg')}}" class="img-responsive">
         <p class="pull-right">ที่มาของบทความ wikipedia __<p>
      </div>

      @elseif(trans('message.lang') == 'Eng')

      <div class="col-md-10 col-md-offset-1">
        <h3>Getting to <span>Chatuchak Weekend Market</span></h3>
        <p><strong>Chatuchak Market</strong> There are many types of private cars that need to be parked at Chatuchak Weekend Market or Park Ride and there is a shuttle bus service between Chatuchak Market and Chatuchak Market.
             Or take a bus that has many lines. It is easy to get off at Mo Chit or MRT. Kamphaengphet Station also has a taxi. Multi-line phone.
             Bus numbers pass through Chatuchak market.
					</p>
          <p>
  					<strong>BTS / MRT</strong>  If you take BTS Sky train to Mo Chit station, exit 1 or if you take the metro ride to Kamphaengphet station.
                Take exit number 2 (projects 1, 2 and book zone) or Chatuchak Station. Take exit No. 1 (close to projects 5, 6 and 7).
  					</p>
         <h4>Bus number <span>Chatuchak Weekend Market</span></h4>
         <hr>

         <h4><span>Bus stop at Chatuchak Park (Phahon Yothin Road)</span></h4>
         <p>Bus : 3, 8, 26, 27, 28, 29, 34, 38, 39, 44, 52, 59, 63, 77, 90, 96, 104, 108, 122, 126, 134, 136, 138, 145, 182, 188</p>
         <p>Air-conditioned bus : ปอ.3, ปอ.28, ปอ.29, ปอ.34, ปอ.39, ปอ.44, ปอ.59, ปอ.63, ปอ.77, ปอ.104, ปอ.126, ปอ.134, ปอ.138, ปอ.145, ปอ.157, ปอ.177, ปอ.502, ปอ.503, ปอ.509, ปอ.510, ปอ.512, ปอ.517, ปอ.524, ปอ.529</p>

         <h4><span>Bus stop at Chatuchak Day and Night or Chatuchak Market Gate 1 (Kamphaengphet 2 Road)</span></h4>
         <p>Bus : 26, 77, 96, 104, 122, 134, 136, 138, 145, 157, 182</p>
         <p>Air-conditioned bus : ปอ.77, ปอ.134, ปอ.138, ปอ.145, ปอ.157, ปอ.509, ปอ.517, ปอ.529, ปอ.536</p>
         <p>Coordinates GPS : 13.799847, 100.549391</p>

         <h4><span>Time to open - Chatuchak Weekend Market.</span></h4>
         <p>วันพุธ - วัพฤหัสสบดี ตลาดนัดต้นไม้ เวลา 05.00 - 18.00 น.</p>
         <p>วันศุกร์ ตลาดนัดเซรามิค เวลา 08.00 - 21.00 น.</p>
         <p>วันเสาร์ - อาทิตย์ ตลาดนัดทั่วไป เวลา 08.00 - 21.00 น.</p>
        <br>
         <h4><span>เบอร์โทร Call Center : 1690 กด 6</span></h4>
         <hr>
         <h3><span>แผนที่การเดินทางรถไฟฟ้า BTS / รถไฟฟ้าใต้ดิน</span></h3>
         <img alt="map" class="img-responsive" src="{{url('assets/image/JJ_Isometric_Map_artwork1.jpg')}}" class="img-responsive">
         <p class="pull-right">ที่มาของบทความ wikipedia __<p>
      </div>

      @else


      <div class="col-md-10 col-md-offset-1">
        <h3>การเดินทางมา <span>ตลาดนัดสวนจตุจักร</span></h3>
        <p><strong>การเดินทาง</strong> มีหลายรูปแบบทั้งรถยนต์ส่วนตัวซึ่งต้องนำไปจอดที่ลานจอดรถตลาดนัดจตุจักรหรือ Park Ride และมีรถรับส่งระหว่างลานจอดรถกับตลาดนัดจตุจักร (ประตู 2)
             หรือนั่งรถประจำทางซึ่งมีหลายสายผ่าน และที่สะดวกมากก็คือโดยสารลงที่สถานีหมอชิตหรือรถไฟฟ้ามหานครรถไฟฟ้าใต้ดินลงที่ สถานีกำแพงเพชรนอกจากนี้ก็ยังมีรถแท็กซี่ และรถตู้หลายสายให้บริการ
             หมายเลขรถประจำทางที่ผ่านตลาดนัดจตุจักร
					</p>
          <p>
  					<strong>รถไฟฟ้า BTS / รถไฟฟ้าใต้ดิน</strong>  ถ้านั่งรถไฟฟ้า BTS ให้ลงที่สถานีหมอชิต ใข้ทางออกที่ 1 หรือถ้านั่งรถไฟฟ้าใต้ดินก็มาขึ้นที่สถานีกำแพงเพชร
               ใช้ทางเข้าออกหมายเลข 2 (โครงการ 1, 2 และโซนหนังสือ) หรือสถานีสวนจตุจักร ใช้ทางเข้าออกหมายเลข 1 (ใกล้กับโครงการ 5, 6 และ 7)
  					</p>
         <h4>หมายเลขรถประจำทางที่ผ่าน <span>ตลาดนัดจตุจักร</span></h4>
         <hr>

         <h4><span>ป้ายรถประจำทางหน้าสวนจตุจักร (ถ.พหลโยธิน)</span></h4>
         <p>รถธรรมดา : 3, 8, 26, 27, 28, 29, 34, 38, 39, 44, 52, 59, 63, 77, 90, 96, 104, 108, 122, 126, 134, 136, 138, 145, 182, 188</p>
         <p>รถปรับอากาศ : ปอ.3, ปอ.28, ปอ.29, ปอ.34, ปอ.39, ปอ.44, ปอ.59, ปอ.63, ปอ.77, ปอ.104, ปอ.126, ปอ.134, ปอ.138, ปอ.145, ปอ.157, ปอ.177, ปอ.502, ปอ.503, ปอ.509, ปอ.510, ปอ.512, ปอ.517, ปอ.524, ปอ.529</p>

         <h4><span>ป้ายรถประจำทางหน้าจตุจักร เดย์ แอนด์ ไนท์ หรือ ตลาดนัดจตุจักร ประตู 1 (ถ.กำแพงเพชร 2)</span></h4>
         <p>รถธรรมดา : 26, 77, 96, 104, 122, 134, 136, 138, 145, 157, 182</p>
         <p>รถปรับอากาศ : ปอ.77, ปอ.134, ปอ.138, ปอ.145, ปอ.157, ปอ.509, ปอ.517, ปอ.529, ปอ.536</p>
         <p>พิกัด GPS : 13.799847, 100.549391</p>

         <h4><span>เวลาเปิด-ปิด ตลาดนัดจตุจักร</span></h4>
         <p>วันพุธ - วัพฤหัสสบดี ตลาดนัดต้นไม้ เวลา 05.00 - 18.00 น.</p>
         <p>วันศุกร์ ตลาดนัดเซรามิค เวลา 08.00 - 21.00 น.</p>
         <p>วันเสาร์ - อาทิตย์ ตลาดนัดทั่วไป เวลา 08.00 - 21.00 น.</p>
        <br>
         <h4><span>เบอร์โทร Call Center : 1690 กด 6</span></h4>
         <hr>
         <h3><span>แผนที่การเดินทางรถไฟฟ้า BTS / รถไฟฟ้าใต้ดิน</span></h3>
         <img alt="map" class="img-responsive" src="{{url('assets/image/JJ_Isometric_Map_artwork1.jpg')}}" class="img-responsive">
         <p class="pull-right">ที่มาของบทความ wikipedia __<p>
      </div>

      @endif





    </div>


        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
