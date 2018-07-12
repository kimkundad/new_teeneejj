แจ้งการชำระเงิน หมายเลขรายการสั่งซื้อ #{{$no_pay}}<br>
ชื่อผู้ติดต่อ : {{$name_pay}}<br>
เบอร์โทรติดต่อ : {{$phone_pay}}<br>
หมายเลขรายการสั่งซื้อ : {{$no_pay}}<br>
ยอดโอน : {{$money_pay}}<br>
ธนาคารที่โอน  : {{$bank}}<br>
วันที่โอน : {{$day_pay}}<br>
เวลา : {{$time_pay}}<br>
หลักฐานการโอน (ถ้ามี)
<br>
@if($files_pay != null)
<img src="{{url('assets/image/payment/'.$files_pay)}}">
@endif
<br>
หมายเหตุ : {{$message_pay}}
