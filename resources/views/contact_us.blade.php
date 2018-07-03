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
                <h1>{{ trans('message.contact_us') }}</h1>
                <p>{{ trans('message.contact_sup') }}</p>
              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">{{ trans('message.index') }}</a></li>
                            <li><a href="#">{{ trans('message.contact_us') }}</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">



    <div class="row add_bottom_45">

      <div class="col-md-8 col-md-offset-2">

        <div class="main_title">
            <h2>TeeneeJJ<span> {{ trans('message.contact_head') }} </span></h2>
            <br>
            @if(trans('message.lang') == 'ไทย')

            <p>ตลาดนัดสวนจตุจักรมีเนื้อที่กว้างขวาง การเดินซื้อของ หรือเที่ยวชมตลาดนัดทั้งหมดภายในวันเดียวนั้น แทบจะเป็นไปไม่ได้เลย ตลาดแห่งนี้ประกอบด้วยร้านค้ามากกว่า 10,000 ร้าน แต่เราคัดสรรร้านค้าและสินค้าที่ดีที่สุดมาให้ถึงมือ</p>
            <p>สำหรับเจ้าของร้านในจัตุจักร จะเป็นอีกช่องทางสำคัญสำหรับธุรกิจของคุณในการสื่อสารกับกลุ่ม ลูกค้าเป้าหมายใหม่ๆเป็นช่องทางการสื่อสารแบบ digital media ที่สามารถทำงานเสริมกับจากเว็บไซต์ของ คุณเองและสื่อ offline ต่างๆ
               ติดต่อโฆษณาได้ที่ <span>teeneejj@gmail.com หรือ โทร. 086-551-7336 </span></p>

            @elseif(trans('message.lang') == 'Eng')

            <p>Chatuchak Weekend Market Shopping Or visit the market all within one day. It is not possible. The market consists of more than 10,000 shops, but we choose the best shops and the best products.</p>
            <p>For the owner of the shop in Jatujak. It is another important channel for your business to communicate with the group. New target customers are digital media channels that can be added to their website. You own and offline media.
                Contact the advertiser. <span>teeneejj@gmail.com หรือ โทร. 086-551-7336 </span></p>

            @else

            <p>Chatuchak 週末市場購物 或者在一天內訪問市場。 這是不可能的。 市場包括10,000多家商店，但我們選擇最好的商店和最好的產品。</p>
            <p>對於Jatujak商店的老闆。 這是您的業務與集團溝通的另一個重要渠道。 新目標客戶是可以添加到其網站的數字媒體渠道。 您擁有和離線媒體。
                聯繫廣告商。่ <span>teeneejj@gmail.com หรือ โทร. 086-551-7336 </span></p>

            @endif



        </div>


        <div class="form_title">
                <h3><strong><i class="icon-pencil"></i></strong>{{ trans('message.contact_sup_title') }}</h3>
                <p>
                    {{ trans('message.contact_sup_title_1') }}
                </p>
            </div>

            <div class="step">

                <div id="message-contact"></div>
                <form method="post" id="contactform">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{ trans('message.con_name') }}</label>
                                <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="คุณแพรวา">
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>{{ trans('message.con_email') }}</label>
                                <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Music@BKK48.com">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>{{ trans('message.con_phone') }}</label>
                                <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="08-115-55-7854">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('message.con_detail') }}</label>
                                <textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="{{ trans('message.con_detail_1') }}" style="height:200px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">

    <div class="col-md-6">


    </div>
</div>
                    <div class="row">
                        <div class="col-md-6">

                            <button class="btn_1" type="submit">{{ trans('message.send_data') }}</button>

                        </div>
                    </div>

                </form>
            </div>


      </div>


    </div>


        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
