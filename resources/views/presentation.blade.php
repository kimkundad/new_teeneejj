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
                <h1>หมวดหมู่</h1>
                <p>teneejj เว็บไซต์ที่รวบรวมแผงค้าตลาดนัดจตุจักรทั้งหมดมากกว่า 8,000 แผงค้า</p>
              </div>
            </div>
        </section>

        <div id="position">
            	<div class="container">
                        	<ul>
                            <li><a href="{{url('/')}}">หน้าหลัก</a></li>
                            <li><a href="#">หมวดหมู่</a></li>

                            </ul>
                </div>
            </div>


            <div class="container margin_60">

    <div class="main_title">
        <h2>หมวดหมู่<span>ที่นี่เจเจ </span></h2>
        <br>
        <p>ตลาดนัดสวนจตุจักร เป็นตลาดนัดที่ใหญ่ที่สุดในประเทศไทย ตลาดนัดแห่งนี้เป็นสถานที่ที่นักท่องเที่ยวที่มาเที่ยวกรุงเทพฯ</p>
    </div>

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


        <hr>

</div>



@endsection

@section('scripts')



@stop('scripts')
