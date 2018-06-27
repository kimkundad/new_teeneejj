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
                <h1>ติดต่อเรา</h1>
                <p>teneejj เว็บไซต์ที่รวบรวมแผงค้าตลาดนัดจตุจักรทั้งหมดมากกว่า 8,000 แผงค้า</p>
              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">หน้าหลัก</a></li>
                            <li><a href="#">ติดต่อเรา</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">



    <div class="row add_bottom_45">

      <div class="col-md-8 col-md-offset-2">

        <div class="main_title">
            <h2>TeeneeJJ<span> คัดสรรร้านค้าและสินค้าในจตุจักรที่ดีที่สุด </span></h2>
            <br>
            <p>ตลาดนัดสวนจตุจักรมีเนื้อที่กว้างขวาง การเดินซื้อของ หรือเที่ยวชมตลาดนัดทั้งหมดภายในวันเดียวนั้น แทบจะเป็นไปไม่ได้เลย ตลาดแห่งนี้ประกอบด้วยร้านค้ามากกว่า 10,000 ร้าน แต่เราคัดสรรร้านค้าและสินค้าที่ดีที่สุดมาให้ถึงมือ</p>
            <p>สำหรับเจ้าของร้านในจัตุจักร จะเป็นอีกช่องทางสำคัญสำหรับธุรกิจของคุณในการสื่อสารกับกลุ่ม ลูกค้าเป้าหมายใหม่ๆเป็นช่องทางการสื่อสารแบบ digital media ที่สามารถทำงานเสริมกับจากเว็บไซต์ของ คุณเองและสื่อ offline ต่างๆ
               ติดต่อโฆษณาได้ที่ <span>teeneejj@gmail.com หรือ โทร. 086-551-7336 </span></p>
              
        </div>


        <div class="form_title">
                <h3><strong><i class="icon-pencil"></i></strong>สอบถามข้อมูลเพิ่มเติม</h3>
                <p>
                    สอบถามข้อมูลเกี่ยวกับร้านค้า ข้อมูลเกี่ยวกับ ตลาดนัดจตุจักร
                </p>
            </div>

            <div class="step">

                <div id="message-contact"></div>
                <form method="post" id="contactform">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>ชื่อผู้ติดต่อ</label>
                                <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="คุณแพรวา">
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>อีเมล</label>
                                <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Music@BKK48.com">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>เบอร์โทรติดต่อ</label>
                                <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="08-115-55-7854">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ข้อความถึงเรา</label>
                                <textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="ข้อความที่ต้องการสอบถามเรา หรือ สินค้าที่อยากได้" style="height:200px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">

    <div class="col-md-6">


    </div>
</div>
                    <div class="row">
                        <div class="col-md-6">

                            <button class="btn_1" type="submit">ส่งข้อความ</button>

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
