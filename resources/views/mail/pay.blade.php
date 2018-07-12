แจ้งการชำระเงิน หมายเลขรายการสั่งซื้อ #{{$no_pay}}
ชื่อผู้ติดต่อ : {{$name_pay}}
เบอร์โทรติดต่อ : {{$phone_pay}}
หมายเลขรายการสั่งซื้อ : {{$no_pay}}
ยอดโอน : {{$money_pay}}
ธนาคารที่โอน  : {{$bank}}
วันที่โอน : {{$day_pay}}
เวลา : {{$time_pay}}
หลักฐานการโอน (ถ้ามี)
<br>
@if($files_pay != null)
<img src="{{url('assets/image/payment/'.$files_pay)}}">
@endif
หมายเหตุ : {{$message_pay}}
