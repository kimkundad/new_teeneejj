<?php
session_start();
include('admin/server/connect.php');
include("fb_connect_popup.php");

$useragent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)))
    header('Location: https://teeneejj.com/map_m.php');

$sqlset = "SELECT * FROM setting";
$resultset = mysqli_query($con,$sqlset)or die(mysql_error());
$rowset = mysqli_fetch_assoc($resultset);


$sqlShowCategory = "SELECT * FROM category WHERE id!=0";
$resultShowCategory = mysqli_query($con,$sqlShowCategory)or die(mysql_error());
$rowShowCategory = mysqli_fetch_array($resultShowCategory);
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TeeneeJJ (ที่นี่เจเจ) เป็นเว็บไซต์และแอปพลิเคชันในไทย ในเรื่องร้านขายสินค้า">
        <meta name="author" content="TeeneeJJ">
        <title>Map TeeneeJJ</title>

        <!-- Favicons-->
        <link rel="shortcut icon" type="image/png" href="img/apple-touch-icon-57x57-precomposed.png?m=<?= time() ?>"/>

        <!-- CSS -->
        <link href="css/base.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/map/style.css">
        <link rel="stylesheet" type="text/css" href="css/frontend/image_mapper.css">

        <!-- Google web fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <link href="css/menuresponsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.teeneejj.com/admin/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="https://www.teeneejj.com/admin/assets/vendor/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="https://www.teeneejj.com/admin/assets/vendor/font-awesome/css/font-awesome.css" />
        <script src="https://www.teeneejj.com/admin/assets/vendor/modernizr/modernizr.js"></script>
        <link rel="stylesheet" href="css/autocomplete.css"  type="text/css"/>
        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            ul#top_links1 {
                list-style: none;
                margin: 0;
                padding: 0;
                float: right;
            }
            #head_footer ul li {
                display: inline-block;
                margin: -5px 5px 10px 0px;
            }
            #head_footer ul li a {
                color: #fff;
                text-align: center;
                line-height: 28px;
                display: block;
                font-size: 16px;
                width: 28px;
                height: 28px;
                border: 1px solid rgba(255,255,255,0.3);
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
            }

            #head_footer ul li a:hover{border:1px solid #fff;background:#fff;color:#111}

            .main_title h2{
                font: normal normal normal 37px / 43px "Open Sans", Helvetica, Arial, Verdana, sans-serif;
            }

            #fb-root {
                display: none;
            }

            /* To fill the container and nothing else */

            .fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
                width: 100% !important;
            }

            #myList li{ display:none;
            }

            #head_footer ul li a {
                color: #8A7E7E;
                text-align: center;
                line-height: 28px;
                display: block;
                font-size: 16px;
                width: 28px;
                height: 28px;
                border: 1px solid rgba(255,255,255,0.3);
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
            }

        </style>
    </head>
    <body>

        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a>.</p>
        <![endif]-->

        <div id="preloader">
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>
        </div>
        <!-- End Preload -->

        <div class="layer"></div>
        <!-- Mobile menu overlay mask -->

        <!-- Header Plain:  add the id plain to header and change logo.png to logo_sticky.png ======================= -->
        <header id="plain">
            <div id="top_line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong><?= $rowset['tel'] ?></strong></div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div style="float: right;">
                                <ul style="list-style-type: none;display: inline-block;">
                                    <li style="display: inline-block"><a style="color: #0a5579;" href="https://teeneejj.com<?=$_SERVER['REQUEST_URI']?>"><img src="images/icons/th.png" /> ไทย</a></li>
                                    <li style="display: inline-block">|</li>
                                    <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/en<?=$_SERVER['REQUEST_URI']?>"><img src="images/icons/us.png" /> ENG</a></li>
                                    <li style="display: inline-block">|</li>
                                    <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/cn<?=$_SERVER['REQUEST_URI']?>"><img src="images/icons/cn.png" width="16px" height="11px"/> 中文</a></li>
                                </ul>
                            </div>
                            <div id="head_footer">
                                <ul id="top_links1">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-google"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram"></i></a></li>


                                </ul>

                            </div>
                            <?php
                            include("top_menu_bar.php");
                            ?>
                        </div>
                    </div><!-- End row -->
                </div><!-- End container-->
            </div><!-- End top line-->

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div id="logo">
                            <a href="https://www.teeneejj.com/"><img src="img/logo_sticky.png"  height="54" alt="<?= $rowset['shop_name'] ?>" data-retina="true" class="logo_normal"></a>
                            <a href="https://www.teeneejj.com/"><img src="img/logo_sticky.png"  height="54" alt="<?= $rowset['shop_name'] ?>" data-retina="true" class="logo_sticky"></a>
                        </div>
                    </div>
                    <nav class="col-md-9 col-sm-9 col-xs-9">
                        <div class="lang-mobile">
                            <ul style="list-style-type: none;display: inline-block;">
                                <li style="display: inline-block"><a style="color: white;" href="https://teeneejj.com<?=$_SERVER['REQUEST_URI']?>">ไทย</a></li>
                                <li style="display: inline-block">|</li>
                                <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/en<?=$_SERVER['REQUEST_URI']?>">ENG</a></li>
                                <li style="display: inline-block">|</li>
                                <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/cn<?=$_SERVER['REQUEST_URI']?>">中文</a></li>
                            </ul>
                            <?php
                            include("top_menu_responsive.php");
                            ?>
                        </div>
                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                        <div class="main-menu">
                            <div id="header_menu">
                                <img src="img/icon_jj_500.png" width="110"  alt="teeneejj" data-retina="true">
                            </div>
                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                            <?php
                            include("header.php");
                            ?>
                        </div><!-- End main-menu -->

                    </nav>
                </div>
            </div><!-- container -->

        </header><!-- End Header -->



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
        <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_3.jpg" data-natural-width="1400" data-natural-height="370">
            <div class="parallax-content-1">
                <div class="animated fadeInDown">
                    <h1>Map</h1>
                </div>
            </div>
        </section><!-- End section -->
        <div class="container" style="margin-top: 10px;margin-bottom: 10px;">
            <div style="text-align:center;position: relative;z-index: 999;">
                <a href="#myModal" class="btn btn-info modal-with-zoom-anim on-default " style="width: 200px;font-weight: bold;">YOU ARE HERE</a>
            </div>
        </div>
        <div id="map" class="map" style="overflow: hidden;   height: 100%; border:none;" >
            <div id="panzoom" style="" >


                <div id="imagemapper4-wrapper" class="imagemapper-wrapper" style="width: 1200px; visibility: visible;">

                    <img id="imapper4-map-image" src="img/New_mapp.jpg" />
                    <?php
                            if ($_POST["section"] || $_POST["alley"]  || $_POST["number"] || $_POST["hdf_breakfast"] ) {
                                $section = $_POST["section"];
                                $alley = $_POST["alley"];
                                $number = $_POST["number"];
                                $other = $_POST["hdf_breakfast"];
                                if($other == ""){
                                    $sqlmap = "SELECT * FROM map_position where id = '$section' or id = '$alley' or id = '$separate' or id = '$number' ORDER BY section desc Limit 1";

                                }else {
                                    $sqlmap = "SELECT * FROM map_position where id = $other Limit 1";
                                }
                                $resultmap = mysqli_query($con,$sqlmap)or die(mysql_error());
                                $rowmap = mysqli_fetch_assoc($resultmap);
                    ?>
                    <div id="imapper4-pin15-wrapper" class="imapper4-pin-wrapper imapper-pin-wrapper" data-left="<?=$rowmap['latitude']?>%" data-top="<?=$rowmap['longitude']?>%" data-open-position="top" data-pin-color="#8e44ad" data-pin-icon="icon-user">
                        <img id="imapper4-pin15" class="imapper4-pin" src="img/youarehere.png" >

                        <div id="imapper4-pin15-content-wrapper" class="imapper4-pin-content-wrapper imapper-content-wrapper" data-text-color="#3e3e3e" data-back-color="#ffffff" data-border-color="#fff" data-border-radius="0" data-width="270px" data-height="140px" data-font="Open Sans">
                            <div id="imapper4-pin15-content" class="imapper-content">
                                <p class="imapper-content-header"><?=$rowmap['name']?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>



                </div>




            </div>
        </div>
        <div id="myModal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
            <form id="demo-form2" action="map.php" method="post">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title" style="font-weight: bold;">YOU ARE HERE</h2>
                    </header>
                    <div class="panel-body">
                        <div id="showalert1"></div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-3 control-label">โครงการ</label>
                            <div class="col-sm-9">
                                <select data-plugin-selecttwo name="section" id="section" class="form-control " >
                                    <option value="0">-- เลือกโครงการ --</option>
                                    <?php
                                    $sql = "SELECT * FROM map_position WHERE id!=0 and section = 1 ORDER BY id";
                                    $result = mysqli_query($con,$sql)or die(mysql_error());
                                    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-3 control-label">ซอย</label>
                            <div class="col-sm-9" id="div_alley">
                                <select data-plugin-selecttwo name="alley" id="alley" class="form-control " >
                                    <option value="0">-- เลือกซอย --</option>
                                    <?php
                                    $sql = "SELECT * FROM map_position WHERE id!=0 and section = 2 ORDER BY id";
                                    $result = mysqli_query($con,$sql)or die(mysql_error());
                                    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <label for="category_id" class="col-sm-3 control-label">แยก</label>
                            <div class="col-sm-9">
                                <select data-plugin-selecttwo name="separate" id="category_id " class="form-control ">
                                    <option value="">-- เลือกแยก --</option>
                                    <?php
                                    $sql = "SELECT * FROM map_position WHERE id!=0 and section = 3 ORDER BY name";
                                    $result = mysqli_query($con,$sql)or die(mysql_error());
                                    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="category_id" class="col-sm-3 control-label">เลขที่</label>
                            <div class="col-sm-9">
                                <select data-plugin-selecttwo name="number" id="number" class="form-control " >
                                    <option value="0">-- เลือกเลขที่ --</option>
                                    <?php
//                                    $sql = "SELECT * FROM map_position WHERE id!=0 and section = 4 ORDER BY name";
//                                    $result = mysqli_query($con,$sql)or die(mysql_error());
//                                    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                                        ?>
                                        <!--<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>-->
                                        <?php
//                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-3 control-label">อื่นๆ</label>
                            <div class="col-sm-9">
                                <input type="text" name="txtbreakfast" class="form-control" id="txtbreakfast" placeholder="ค้นหาสถานที่"/>
                                <input name="hdf_breakfast" type="hidden" id="hdf_breakfast" value="" />
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary " onclick="clicksound.playclip()">ตกลง</button>
                                <button class="btn btn-default modal-dismiss">ยกเลิก</button>
                            </div>
                        </div>
                    </footer>

                </section>
            </form>
        </div>


        <!-- Common scripts -->
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/common_scripts_min.js"></script>
        <script src="js/functions.js"></script>
        <!-- Map -->

        <script src="dist/jquery.panzoom.js"></script>
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

        <script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/autocomplete.js"></script>
        <script type="text/javascript" src="js/frontend/jquery.image_mapper.js"></script>
        <script type="text/javascript" src="js/frontend/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="js/frontend/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/frontend/jquery.prettyPhotos.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/vendor/magnific-popup/magnific-popup.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/vendor/jquery-autosize/jquery.autosize.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/javascripts/ui-elements/examples.modals.js"></script>
        <script src="https://www.teeneejj.com/admin/assets/javascripts/ui-elements/examples.loading.overlay.js"></script>
        <script type="text/javascript">
                                    (function ($) {
                                        $(window).load(function () {
                                            $('#imagemapper1-wrapper,#imagemapper2-wrapper,#imagemapper3-wrapper,#imagemapper5-wrapper').imageMapper({itemOpenStyle: 'click', itemDesignStyle: 'responsive', pinScalingCoefficient: 1, mapOverlay: true, blurEffect: true});
                                            $('#imagemapper4-wrapper').imageMapper({itemOpenStyle: 'click', itemDesignStyle: 'responsive', pinScalingCoefficient: 1, mapOverlay: false, blurEffect: false});
                                            $('#imagemapper6-wrapper').imageMapper({itemOpenStyle: 'hover', itemDesignStyle: 'responsive', advancedPinOptions: true, pinScalingCoefficient: 1, categories: true, showAllCategory: true});
                                        });
                                    })(jQuery);
        </script>

        <script>

            $("#section").on("change", function() {
                var section_id = this.value;
                $("#alley").load("loadDataAlley.php?sec_id="+section_id);
                $("#number").load("loadDataNumber.php?sec_id="+section_id);
                $( "#txtbreakfast" ).prop( "disabled", (section_id != 0) );
            });
            $("#alley").on("change", function() {
                var alley_id = this.value;
                $( "#txtbreakfast" ).prop( "disabled", (alley_id != 0) );
                $("#number").load("loadDataNumber.php?all_id="+alley_id);
            });
            $( "#txtbreakfast" ).on("blur",function(){
                var isdisable = $(this).val() != "" ? true : false;
                $("#alley").prop( "disabled", isdisable );
                $("#number").prop( "disabled", isdisable );
                $("#section").prop( "disabled", isdisable );
            });

            function make_autocom(autoObj,showObj){
                    var mkAutoObj=autoObj;
                    var mkSerValObj=showObj;
                    new Autocomplete(mkAutoObj, function() {
                            this.setValue = function(id) {
                                    document.getElementById(mkSerValObj).value = id;
                            }
                            if ( this.isModified )
                                    this.setValue("");
                            if ( this.value.length < 1 && this.isNotClick )
                                    return ;
                            return "gdata.php?q=" +encodeURIComponent(this.value);
                });
            }
            make_autocom("txtbreakfast","hdf_breakfast");
        </script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-72009222-1', 'auto');
            ga('send', 'pageview');

        </script>

    </body>
</html>
