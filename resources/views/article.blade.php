@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')



<style>
.juicer-feed h1.referral{
  display: none !important;
}
</style>



            <div class="container margin_60">



    <div class="row add_bottom_45" style="margin-top:60px;">

      <div class="col-md-10 col-md-offset-1">

        <div class="main_title">
            <h2><span>{{ trans('message.article') }} </span></h2>
            <hr>
            <br>

            <ul class="juicer-feed" data-feed-id="teeneejj"><h1 class="referral"><a href="https://www.juicer.io">Powered by Juicer</a></h1></ul>

        </div>

        <hr>
      </div>


    </div>




</div>



@endsection

@section('scripts')
<script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
<link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />

<script>
$(document).ready(function(){
  var element = document.getElementById("set-head");
element.classList.add("sticky");
var $window = $(window);
$window.scroll(function() {
  var element = document.getElementById("set-head");
element.classList.add("sticky");
  });
  });
</script>
@stop('scripts')
