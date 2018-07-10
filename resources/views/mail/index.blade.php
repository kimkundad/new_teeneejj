<div style="font-family:verdana;font-size:12px;color:#555555;line-height:14pt">
<div style="width:590px">
<div style="background:url('{{url('assets/image/email_top.png')}}') no-repeat;width:100%;height:75px;display:block">
<div style="padding-top:30px;padding-left:50px;padding-right:50px">
<a href="#" target="_blank" ><img src="{{url('assets/img/logo.png')}}" alt=""
  style="border:none; height:42px;" ></a>
</div>
</div>
<div style="background:url('{{url('assets/image/email_mid.png')}}')
repeat-y;width:100%;display:block">
<div style="padding-left:50px;padding-right:50px;padding-bottom:1px">
<div style="border-bottom:1px solid #ededed"></div>
<div style="margin:20px 0px;font-size:27px;line-height:30px;text-align:left">ใบสั่งจอง</div>
<div style="margin-bottom:30px">
<div>คุณสั่งซื้อสินค้าจาก Teeneejj</div>
<br>
<div style="margin-bottom:20px;text-align:left">
  <b>หมายเลขคำสั่งจอง:</b> {{$data->id}}<br>
  <b>วันที่สั่งจอง:</b> {{$datatime}}<br>
  <b>ชื่อ:</b>  {{$data->name_order}} {{$data->lastname_order}}<br>
  <b>เบอร์โทร:</b> {{$data->telephone_order}}<br>
  <b>อีเมล:</b> {{$data->email_order}}<br>
  <b>รายละเอียดการจัดส่ง:</b> {{$data->street_order}} {{$data->country_order}}  {{$data->postal_code_order}}
</div>
</div>
<div>
<div>
</div>
<span></span>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:left;font-weight:bold;font-size:12px">รายการ</td>
<td style="text-align:right;font-weight:bold;font-size:12px" width="70">ราคา</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
</tr>
@if($order_detai1)
@foreach($order_detai1 as $order_details)
    <tr>
      <td style="text-align:left;font-size:12px;padding-right:10px">
        <span>{{$order_details->product_name}} x {{$order_details->product_total}}</span>
      </td>
      <td style="text-align:right;font-size:12px">
        <span>THB{{$order_details->product_price}}.00</span>
        <span></span>
      </td>
    </tr>
    @endforeach
    @endif
</tbody>
</table>
<div style="border-bottom:1px solid #ededed">
</div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:right;font-size:12px" width="150">
ภาษี: <span>THB0.00</span>
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
<span>รวม: </span>THB{{$data->total}}.00
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
<span>ค่าจัดส่ง: </span>THB{{$data->total}}.00
</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0 15px 0;padding:0;border-spacing:0">
  <tbody>
    @if($bank)
    @foreach($bank as $banks)
    <tr>
    <td style="text-align:left;font-weight:bold;font-size:12px;vertical-align:top">{{$banks->bank_name}}</td>
    <td style="text-align:left;font-size:12px;vertical-align:top">{{$banks->bank_owner}}</td>
      <td>
        <table style="margin-left:auto;font-size:12px">
          <tbody>
            <tr>
              <td style="font-size:12px;text-align:right">
                {{$banks->bank_number}}
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
</div><div style="margin:20px 0">หากมีคำถาม ติดต่อ <a href="#" target="_blank" >086 551 7336</a>
</div><div style="border-bottom:1px solid #ededed"></div>
<div style="border-bottom:1px solid #ededed">
</div>
<div style="margin:20px 0 40px 0;font-size:10px;color:#707070">
ดู<a href="#" target="_blank">ประวัติการสั่งซื้อ</a>
บน Teeneejj ข้อมูลส่วนตัวของคุณ<br>
ดู<a href="#" target="_blank" >นโยบายการคืนเงิน</a>ของ Teeneejj และ<a href="#" target="_blank">ข้อกำหนดในการให้บริการ</a>
</div>
<div style="font-size:9px;color:#707070">

<br>© 2019 Teeneejj | สงวนลิขสิทธิ์<br> ตลาดนัดในกรุงเทพมหานคร มีจำนวนแผงค้าทั้งหมดมากกว่า 8,000 แผงค้า</div>
</div></div>
<div class="yj6qo"></div>
<div style="background:url('{{url('assets/image/email_bottom.png')}}') no-repeat;width:100%;height:50px;display:block"></div></div></div>
