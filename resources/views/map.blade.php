@extends('layouts.template')

@section('title')
TEENEEJJ - ตลาดนัดสวนจตุจักร
@stop

@section('stylesheet')


@stop('stylesheet')
@section('content')

<style type="text/css">
            .imagemapper-wrapper{
                width: 1200px !important;
                visibility: visible;
                cursor: pointer;
                -webkit-transform: matrix(1.1, 0, 0, 1.1, 0,-240);
            }
            .imapper-pin-icon {
                left: -21px !important;
                font-size: 30px;
                top: -64px !important;
            }
            .btn-info{
                background-color: #5bdecc;
                border-color: #5bdecc;
            }
            .btn-info:hover{
                background-color: #1AAE88;
                border-color: #1AAE88;
            }
            .btn-info:focus{
                background-color: #5bdecc;
                border-color: #5bdecc;
            }
        </style>
<section class="parallax-window" data-parallax="scroll" data-image-src="{{url('assets/img/home_bg_3.jpg')}}" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Map</h1>
                </div>
            </div>
        </section>


        <div id="map" class="map" style="overflow: hidden;   height: 100%; border:none;" >
            <div id="panzoom" style="" >


                <div id="imagemapper4-wrapper" class="imagemapper-wrapper" style="width: 1200px; visibility: visible; margin: 0 auto;">



                    <img id="imapper4-map-image" src="{{url('assets/img/New_mapp.jpg')}}" style="max-width: 100%;">



                </div>




            </div>
        </div>


@endsection

@section('scripts')

<script src="{{url('assets/js/jquery.panzoom.js')}}"></script>
<script>
                                    $("#panzoom").panzoom({
                                        $zoomIn: $(".zoom-in"),
                                        $zoomOut: $(".zoom-out"),
                                        $zoomRange: $(".zoom-range"),
                                        $reset: $(".reset")
                                    });

                                    $(document).ready(function () {
                                        $("#panzoom").panzoom("pan", 0, 280, {
                                            relative: true
                                        });
                                        size_li = $("#myList li").size();
                                        x = 3;
                                        $('#myList li:lt(' + x + ')').show();
                                        $('#loadMore').click(function () {
                                            x = (x + 3 <= size_li) ? x + 3 : size_li;
                                            $('#myList li:lt(' + x + ')').show();
                                        });
                                        $('#showLess').click(function () {
                                            x = (x - 3 < 0) ? 3 : x - 3;
                                            $('#myList li').not(':lt(' + x + ')').hide();
                                        });
                                    });
        </script>

@stop('scripts')
