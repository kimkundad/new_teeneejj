<?php
session_start();


include('admin/server/connect.php');
include("fb_connect_popup.php");

$id=$_REQUEST['id'];

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: https://teeneejj.com/shop.php'."?id=".$id);


//รับค่า
if(empty($_REQUEST['id'])){echo"<script>history.back();</script>";exit;}
$id=$_REQUEST['id'];
//เพิ่มจำนวนผู้เข้าชม
if(!isset($_SESSION['username'])){
  $sql="UPDATE product SET view=(view+1) WHERE id=$id";
  mysqli_query($con,$sql)or die(mysql_error());
}
//สินค้า
$sql="SELECT * FROM product WHERE id=$id";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result);
$num=mysqli_num_rows($result);
$keyword=$row['keyword'];



$sqlImage="SELECT * FROM product_image WHERE product_id=$id";
$resultImage=mysqli_query($con,$sqlImage)or die(mysql_error());
$rowImage=mysqli_fetch_assoc($resultImage);


$sqlset="SELECT * FROM setting";
$resultset=mysqli_query($con,$sqlset)or die(mysql_error());
$rowset=mysqli_fetch_assoc($resultset);


?>

<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
<?php

//ข้อมูลร้าน
$sqlSetting="SELECT * FROM setting";
$resultSetting=mysqli_query($con,$sqlSetting)or die(mysql_error());
$rowSetting=mysqli_fetch_assoc($resultSetting);


//หมวดสินค้า
$sqlShowCategory="SELECT * FROM category WHERE id=$row[category_id]";
$resultShowCategory=mysqli_query($con,$sqlShowCategory)or die(mysql_error());
$rowShowCategory=mysqli_fetch_assoc($resultShowCategory);
$numShowCategory=mysqli_num_rows($resultShowCategory);
?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TeeneeJJ (ที่นี่เจเจ) เป็นเว็บไซต์และแอปพลิเคชันในไทย ในเรื่องร้านขายสินค้า">
    <meta name="author" content="TeeneeJJ">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <title>TEENEEJJ - ตลาดนัดสวนจตุจักร</title>

    <!-- Favicons-->
    <link rel="shortcut icon" type="image/png" href="img/apple-touch-icon-57x57-precomposed.png?m=<?=time()?>"/>

    <!-- Facebook-->
    <meta property="fb:app_id"          content="935699479860195" />
    <meta property="og:type"            content="website" />
    <meta property="og:url"             content="https://www.teeneejj.com/shop-<?=$row['id']?>" />
    <meta property="og:title"           content="<?=$row['name']?>" />
    <meta property="og:image"           content="https://www.teeneejj.com/admin/cusimage/<?=$rowImage['image']?>" />
    <meta property="og:description"    content="<?=mb_substr(strip_tags($row['detail']),0,200,'UTF-8')?>" />

    <!-- CSS -->
    <link href="css/base.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="dist/css/lightbox.css">
    <link href="css/date_time_picker.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/star-rating.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/vendor/pnotify/pnotify.custom.css">

        <link rel="stylesheet" type="text/css" href="css/map/style.css">
    <link rel="stylesheet" type="text/css" href="css/frontend/image_mapper.css">
    <link rel="stylesheet" href="https://www.teeneejj.com/admin/assets/vendor/magnific-popup/magnific-popup.css" />
     <!-- Google web fonts -->
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
   <link href="css/menuresponsive.css" rel="stylesheet">
   <script src="https://www.teeneejj.com/admin/assets/vendor/modernizr/modernizr.js"></script>
   <link rel="stylesheet" href="css/autocomplete.css"  type="text/css"/>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

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

     </style>

    <!-- Header================================================== -->
    <header>
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong><?=$rowset['tel']?></strong></div>

                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div style="float: right;">
                                <ul style="list-style-type: none;display: inline-block;">
                                    <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/"><img src="images/icons/th.png" /> ไทย</a></li>
                                    <li style="display: inline-block">|</li>
                                    <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/en/"><img src="images/icons/us.png" /> ENG</a></li>
                                    <li style="display: inline-block">|</li>
                                    <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/cn/"><img src="images/icons/cn.png" width="16px" height="11px"/> 中文</a></li>
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
                        <a href="https://www.teeneejj.com/"><img src="img/logo.png"  height="54" alt="<?=$rowSetting['shop_name']?>" data-retina="true" class="logo_normal"></a>
                        <a href="https://www.teeneejj.com/"><img src="img/logo_sticky.png"  height="54" alt="<?=$rowSetting['shop_name']?>" data-retina="true" class="logo_sticky"></a>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <div class="lang-mobile">
                        <ul style="list-style-type: none;display: inline-block;">
                            <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/">ไทย</a></li>
                            <li style="display: inline-block">|</li>
                            <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/en/">ENG</a></li>
                            <li style="display: inline-block">|</li>
                            <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/cn/">中文</a></li>
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

    <section class="parallax-window" style="min-height: 270px;" data-parallax="scroll" data-image-src="admin/cusimage/<?=$row['timeline']?>" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8" style="margin-top:20px;">



                    <span class="rating">
                        <?php
for($i=1;$i <= $row['rating'];$i++){
?>

                            <i class="icon-star voted"></i>
    <?php
    }
    ?>

<?php
$total = 5;
$total -= $row['rating'];

for($i=1;$i <= $total;$i++){
?>

                           <i class="icon-star-empty"></i>
    <?php
    }
    ?>
                    </span>



                    <h1><?=$row['name']?></h1>
                    <span><?=$row['keyword']?></span>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main" class="hotel">
                        ยอดการเข้าชม <span><sup></sup><?=$row['view']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End section -->

    <div id="position">
            <div class="container">
                        <ul>
                        <li><a href="https://www.teeneejj.com">Home</a></li>
                        <li><a href="category-<?=$rowShowCategory['id']?>"><?=$rowShowCategory['name']?></a></li>
                        <li><?=$row['name']?></li>
                        </ul>
            </div>
    </div><!-- End Position -->

<style type="text/css">
.imagemapper-wrapper{
  width: 1200px !important;
}
.imapper-pin-icon {
    left: -14px !important;
    font-size: 20px;
}
</style>

     <div class="collapse" id="collapseMap">
         <div class="container" style="margin-top: 10px;">
            <div style="text-align:center;position: relative;z-index: 999;">
                <a href="#myModal" class="btn btn-info modal-with-zoom-anim on-default " style="width: 200px;margin-bottom: 10px;font-weight: bold">YOU ARE HERE</a>
            </div>
        </div>
        <div id="map" class="map" style="overflow: hidden;     height: 325px;" >
            <div id="panzoom" style="transform: matrix(1.5, 0, 0, 1.5, 0, -137);" >


            <div id="imagemapper4-wrapper" class="imagemapper-wrapper" style="width: 1200px; visibility: visible;">

        <img id="imapper4-map-image" src="img/New_mapp.jpg" />


<?php
$sqlmap="SELECT * FROM product WHERE id=$id";
$resultmap=mysqli_query($con,$sqlmap)or die(mysql_error());
for($i=0;$rowmap=mysqli_fetch_array($resultmap);$i++){
?>


        <div id="imapper4-pin15-wrapper" class="imapper4-pin-wrapper imapper-pin-wrapper" data-left="<?=$rowmap['latitude']?>%" data-top="<?=$rowmap['longitude']?>%" data-open-position="top" data-pin-color="#8e44ad" data-pin-icon="<?=$rowShowCategory['icon']?>">
            <img id="imapper4-pin15" class="imapper4-pin" src="images/icons/5/1.png">

            <div id="imapper4-pin15-content-wrapper" class="imapper4-pin-content-wrapper imapper-content-wrapper" data-text-color="#3e3e3e" data-back-color="#ffffff" data-border-color="#fff" data-border-radius="0" data-width="270px" data-height="140px" data-font="Open Sans">
                <div id="imapper4-pin15-content" class="imapper-content">
                    <p class="imapper-content-header"><?=$rowmap['name']?></p>
                    <div class="imapper-content-text">
                        <img src="admin/cusimage/<?=$rowmap['image']?>" alt="building" style="float:right; width:89px; height:69px;" align="right" /img><?=$rowmap['keyword2']?><br><?=$rowmap['phone']?>
                    </div>
                </div>
            </div>
        </div>

 <?php
 }
 ?>
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
                        <img id="imapper4-pin15" class="imapper4-pin" src="img/youarehere.png">

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
    </div><!-- End Map -->
    <div id="myModal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
            <form id="demo-form2" action="shop-<?=$id?>" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="action" value="true">
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
                                    $sql_map = "SELECT * FROM map_position WHERE id!=0 and section = 1 ORDER BY id";
                                    $result_map = mysqli_query($con,$sql_map)or die(mysql_error());
                                    for ($i = 0; $row_map = mysqli_fetch_assoc($result_map); $i++) {
                                        ?>
                                        <option value="<?= $row_map['id'] ?>"><?= $row_map['name'] ?></option>
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
                                    $sql_map = "SELECT * FROM map_position WHERE id!=0 and section = 2 ORDER BY id";
                                    $result_map = mysqli_query($con,$sql_map)or die(mysql_error());
                                    for ($i = 0; $row_map = mysqli_fetch_assoc($result_map); $i++) {
                                        ?>
                                        <option value="<?= $row_map['id'] ?>"><?= $row_map['name'] ?></option>
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
                                    $sql_map = "SELECT * FROM map_position WHERE id!=0 and section = 3 ORDER BY name";
                                    $result_map = mysqli_query($con,$sql_map)or die(mysql_error());
                                    for ($i = 0; $row_map = mysqli_fetch_assoc($result_map); $i++) {
                                        ?>
                                        <option value="<?= $row_map['id'] ?>"><?= $row_map['name'] ?></option>
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
    <div class="container margin_60">
    <div class="row">
        <div class="col-md-8" id="single_tour_desc">

            <p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a></p><!-- Map button for tablets/mobiles -->



<div class="row magnific-gallery">


<?php
$rowImage = array();
//รูป
$sqlImage="SELECT image FROM product_image WHERE product_id=$id";
$resultImage=mysqli_query($con,$sqlImage)or die(mysql_error());
$numImage=mysqli_num_rows($resultImage);
for($i=0;$rowImage1=mysqli_fetch_array($resultImage);$i++){

    $rowImage[$i] = $rowImage1['image'];
}


?>


<div class="col-md-6 col-sm-6" style="padding-right: 3px;" >

      <a class="example-image-link" href="admin/cusimage/<?=$rowImage[0]?>" data-lightbox="example-set" ><img class="img-responsive example-image" src="admin/cusimage/<?=$rowImage[0]?>" alt=""/></a>
       </div>

       <div class="col-md-6 col-sm-6" style="padding-left: 3px;" >

     <a class="example-image-link" href="admin/cusimage/<?=$rowImage[1]?>" data-lightbox="example-set" ><img class="img-responsive example-image" src="admin/cusimage/<?=$rowImage[1]?>" alt="" /></a>
       </div>



<div class="col-md-4 col-sm-4" style="padding-right: 0px; padding-top:5px" >

      <a class="example-image-link" href="admin/cusimage/<?=$rowImage[2]?>" data-lightbox="example-set" ><img class="img-responsive example-image" src="admin/cusimage/<?=$rowImage[2]?>" alt=""/></a>
       </div>

       <div class="col-md-4 col-sm-4" style="padding-left: 6px; padding-right:6px; padding-top:5px; " >

     <a class="example-image-link" href="admin/cusimage/<?=$rowImage[3]?>" data-lightbox="example-set" ><img class="img-responsive example-image" src="admin/cusimage/<?=$rowImage[3]?>" alt="" /></a>
       </div>


       <div class="col-md-4 col-sm-4" style="padding-left: 0px; padding-top:5px" >

      <a class="example-image-link" href="admin/cusimage/<?=$rowImage[4]?>" data-lightbox="example-set" ><img class="img-responsive example-image" src="admin/cusimage/<?=$rowImage[4]?>" alt=""/></a>
       </div>



</div>















            <hr>

<div class="row magnific-gallery add_bottom_60 ">

                    <h3>สินค้าใหม</h3>
<?php
$sqlImage1="SELECT image FROM product_image1 WHERE product_id=$id";
$resultImage1=mysqli_query($con,$sqlImage1)or die(mysql_error());

for($i=0;$rowImage11=mysqli_fetch_array($resultImage1);$i++){
?>

                   <div class="col-md-4 " style="    padding-right: 5px;
    padding-left: 5px;">
                     <a class="example-image-link" href="admin/cusimage/<?=$rowImage11['image']?>" data-lightbox="example-set" ><img class="img-responsive styled" style="margin-top: 10px;" src="admin/cusimage/<?=$rowImage11['image']?>" alt=""/></a>
                   </div>
                   <?php } ?>

</div>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <h3>รายละเอียด</h3>
                </div>

                <div class="col-md-9">
                    <p style="font-size:16px;" align="justify">
                    <div class="vid">
<?=$row['detail1']?>

</div>
<?=$row['detail']?>
                    </p>
                    <h4>ข้อมูลการติดต่อ</h4>
                    <p><b>ที่อยู่ร้าน :</b> <?=$row['keyword']?></p>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                <li><i class="fa icon-desktop"></i> : <?=$row['website']?></li>
                                <li><i class="fa icon-mail-2"></i> : <?=$row['email']?></li>
                                <li><i class="fa icon-phone"></i> : <?=$row['phone']?></li>
                                <li><i class="fa icon-facebook"></i> : <?=$row['facebook']?></li>

                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                <li><i class="fa icon-comment-empty"></i> : <?=$row['line']?></li>
                                <li><i class="fa icon-instagramm"></i> : <?=$row['instagram']?></li>


                            </ul>
                        </div>



                    </div><!-- End row  -->

<hr>

<div class="row">
  <div class="col-md-3">
                    <h3>ราคา</h3>
                </div>

  <div class="col-md-9">
  <h4><?=$row['startprice']?> - <?=$row['endprice']?> บาท</h4>
    </div>
</div>




<hr>


                    <div class="row">
                        <div class="col-md-4" style="margin-top:-12px; width: 33.33333333%; float:left;">
                    <h4>Social share</h4>
                </div>
                        <div class="col-md-4" style="width: 33.33333333%;float:left;">
                        <div class="fb-like" data-href="https://www.teeneejj.com/shop-<?=$row['id']?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                        </div>

                         <div class="col-md-2" style="    width: 16.66666667%; float:left;">
                        <div class="g-plusone" data-href="https://www.teeneejj.com/shop-<?=$row['id']?>"></div>
                        </div>
                         </div>



                </div><!-- End col-md-9  -->
            </div><!-- End row  -->











            <hr>

            <div class="row">
              <div class="col-md-12">
                <h4>คุณอาจจะสนใจ</h4>
              </div>


              <style>
              .descript-t {
                  float: right;
                  height: 40px;
              }
              .rating {
                    font-size: 16px;
                }
              </style>




<?php

$sqlran="SELECT * FROM product WHERE category_id= '".$rowShowCategory['id']."' ORDER BY RAND() limit 3";
$resultran=mysqli_query($con,$sqlran)or die(mysql_error());
for($i=0;$rowran=mysqli_fetch_array($resultran);$i++){
 ?>



              <div class="col-md-4">

                <div class="thumbnail a_sd_move">
                          <div style="max-height: 184px; overflow: hidden; position: relative;">
                          <a href="shop-<?=$rowran['id']?>">
                          <img src="admin/cusimage/<?=$rowran['image']?>">


                          </a></div>
                          <div class="caption" style="padding: 3px;">
                            <div class="descript bold">
                                <a href="#"><?=$rowran['name']?></a>
                            </div>
                            <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                              <?=$rowShowCategory['name']?>                           </div>

                            <div class="descript" style="height: 20px;">
                              <span style="color: #777; font-size: 12px;"><i class="fa fa-heart " style="color:#e04f67"></i> <?=$rowran['view']?></span>
                              <div class="descript-t">
                              <div class="postMetaInline-authorLockup">


                                <div class="rating">
                                    <?php
            for($i=1;$i <= $rowran['rating'];$i++){
            ?>

                                        <i class="fa fa-star voted"></i>
                <?php
                }
                ?>

            <?php
            $total = 5;
            $total -= $rowran['rating'];

            for($i=1;$i <= $total;$i++){
            ?>

                                       <i class="fa fa-star-o"></i>
                <?php
                }
                ?>
                <span style="color: #777; font-size: 12px;"><?=$rowran['rating']?>.0</span>
                                </div>




                                                    <!--            <div class="rating">
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star voted"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span style="color: #777; font-size: 12px;">4.0</span>
                                </div> -->

                              </div>
                              </div>
                            </div>

                          </div>
                        </div>

              </div>

<?php
}
 ?>







            </div>


            <hr>



            <div class="row">
                <div class="col-md-3">
                    <h3>Reviews</h3>
                </div>
                <div class="col-md-9">



<?php
$total1 = 0;
$sqlcom="SELECT * FROM webboard_reply WHERE post_id=$id";
$resultcom=mysqli_query($con,$sqlcom)or die(mysql_error());
$numcom=mysqli_num_rows($resultcom);
for($i=0;$rowcom=mysqli_fetch_assoc($resultcom);$i++){


    $total1 += $rowcom['rating'];

}

$total1

?>

<?php
    $scoreview = "";

  if($row['view'] < 50){
    $scoreview = "No rating";
  } else if($row['view'] < 100 && $row['view'] > 50){
    $scoreview = "Pleasant";
  } else if($row['view'] < 350 && $row['view'] > 100){
    $scoreview = "Good";
  } else if($row['view'] < 550 && $row['view'] > 350){
    $scoreview = "Very good";
  } else {
    $scoreview = "Superb";
  }
?>

                    <div id="score_detail" style="margin-bottom: 3px;"><span><?=(number_format((float)($total1/$numcom), 1, '.', ''))?></span><?=$scoreview?> <small>(Based on <?=$numcom?> reviews)</small></div><!-- End general_rating -->
                   <div class="row" id="rating_summary">




                    </div><!-- End row -->
<hr>







<?php if(isset($_SESSION['ssUsername'])){


$username=$_SESSION['ssUsername']; $userid=$_SESSION['ssUserId'];
$sqla="SELECT * FROM users WHERE oauth_uid = '$userid'";
        $resulta=mysqli_query($con,$sqla)or die(mysql_error());
        $rowa=mysqli_fetch_assoc($resulta);
        $iduser = $rowa['oauth_uid'];
        $username = $rowa['username'];
        $tel = $rowa['tel'];
        $picture = $rowa['picture'];


?>


<form  action="admin/server/actions.php" method="post" enctype="multipart/form-data" name="product" >
                    <div class="review_strip_single">
                        <img src="<?=$picture?>" alt="" style="width:76px; border: 1px solid #E4E1E1;" class="img-circle">
                        <small> - <?php date_default_timezone_set('Asia/Bangkok');
                                   echo date("d F Y");
                                   ?> -</small>
                        <h4> <?=$username?> </h4>

                        <div class="form-group" style="margin-bottom: 5px;">
                        <textarea class="form-control" name="comment" rows="3" maxlength="300" required></textarea>
                        </div>
                        <input name="id" type="hidden" id="id" value="<?=$row['id']?>"/>
                        <input name="action" type="hidden"  value="postcomment"/>
                        <input name="name" type="hidden"  value="<?=$username?>"/>
                        <input name="user_id" type="hidden"  value="<?=$iduser?>"/>

                        <div class="row" id="rating_summary" style="display: block; height:30px;">


                        <div class="col-md-6" style="margin-top:5px;line-height: 24px;">
                            <input id="input-2c" class="rating" min="0" max="5" name="rating" step="0.5" data-size="xs"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa">

                        </div>


                    </div><!-- End row -->





                        <div style="display:block; margin-bottom:30px; margin-top:7px;">
                        <button class="btn_1 green pull-right" type="submit" > Post Comment </button>
                        </div>


                    </div><!-- End review strip -->
                    </form>


<?php
} else {
?>

<style type="text/css">
.ap-please-login {
    border: 2px solid #eee;
    border-radius: 3px;
    display: table;
    margin: 20px auto 0;
    padding: 6px 10px;
    text-align: center;
}
.wp-social-login-provider-list {
    display: table;
    margin: 0 auto;
    padding: 10px;
}
.wp-social-login-provider-list {
    padding: 10px;
}
.wp-social-login-provider-facebook {
    background: #3B5998 !important;
}
.wp-social-login-provider {
    color: #fff;
}
.wp-social-login-provider-google {
    background: #5bc0de !important;
}
</style>
<div class="ap-please-login">
        Please Login with <a href="login?action=shop-<?=$row['id']?>">Social media</a>.
<!--
    wsl_render_auth_widget
    WordPress Social Login 2.2.3.
    https://wordpress.org/plugins/wordpress-social-login/
-->

<style type="text/css">
#wp-social-login-connect-with{font-weight: bold}#wp-social-login-connect-options{padding:10px}#wp-social-login-connect-options a{text-decoration: none}#wp-social-login-connect-options img{border:0 none}.wsl_connect_with_provider{}
</style>

<div class="wp-social-login-widget">

    <div class="wp-social-login-connect-with"></div>

    <div class="wp-social-login-provider-list">
    <a rel="nofollow" href="login?action=shop-<?=$row['id']?>" style="margin-right:3px;     width: 100%; "  class="button_drop outline">
     <span>Login with social</span>
    </a>


    </div>

    <div class="wp-social-login-widget-clearing"></div>

</div>




<!-- wsl_render_auth_widget -->

    </div>

<?php
}

?>













<ul id="myList" style="list-style-type:none; -webkit-padding-start: 1px;">

<?php
//รูป
$sqlcom="SELECT * FROM webboard_reply WHERE post_id=$id ORDER BY insert_date DESC";
$resultcom=mysqli_query($con,$sqlcom)or die(mysql_error());
$numcom=mysqli_num_rows($resultcom);
for($i=0;$rowcom=mysqli_fetch_assoc($resultcom);$i++){


$sqla1="SELECT * FROM users WHERE oauth_uid = '$rowcom[user_id]'";
        $resulta1=mysqli_query($con,$sqla1)or die(mysql_error());
        $rowa1=mysqli_fetch_assoc($resulta1);
        $iduser = $rowa1['oauth_uid'];
        $username = $rowa1['username'];
        $tel = $rowa1['tel'];
        $picture = $rowa1['picture'];



$time = strtotime($rowcom['insert_date']);
$my_format = date("d F Y", $time);



?>

                  <li>
                    <div class="review_strip_single" id="comment-id<?=$rowcom['id']?>">

                        <img src="<?=$picture?>" alt="<?=$username?>" style="width:76px; border: 1px solid #E4E1E1;" class="img-circle">
                        <small> - <?=$my_format?> -</small>
                        <h4><?=$rowcom['username']?></h4>
                        <p>
                             "<?=$rowcom['detail']?>."
                        </p>
                        <div class="rating">
                            <?php
for($i=1;$i <= $rowcom['rating'];$i++){
?>

                            <i class="icon-star voted"></i>
    <?php
    }
    ?>

<?php
$total = 5;
$total -= $rowcom['rating'];

for($i=1;$i <= $total;$i++){
?>

                           <i class="icon-star-empty"></i>
    <?php
    }
    ?>



    <?php
    if($rowcom['user_id'] == $_SESSION['ssUserId']){
    ?>

    <a data-toggle="dropdown" class="dropdown-toggle" href="" style=" top:-20px;"  aria-haspopup="true" ><i class="fa fa-cog pull-right" style="width:20px; height:20px;"></i></a>
              <ul class="dropdown-menu option-e pull-right" style="margin-top: -14px;" role="menu" aria-labelledby="dLabel">
                <li role="presentation"><a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim"  href="#modalAnim2-<?=$rowcom['id']?>"><i class="fa fa-wrench"></i> Edit</a></li>
                <li role="presentation"><a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim"  href="#modalAnim<?=$rowcom['id']?>"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
              <div id="modalAnim<?=$rowcom['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                 <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="admin/server/actions.php" method="post" enctype="multipart/form-data">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Are you sure?</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fa fa-question-circle"></i>
                                                    </div>
                                                    <input name="action" type="hidden"  value="delcomment"/>
                                                    <input name="id" type="hidden" id="id" value="<?=$rowcom['id']?>"/>
                                                    <input name="p_id" type="hidden" id="id" value="<?=$rowcom['post_id']?>"/>
                                                    <div class="modal-text">
                                                        <p>Are you sure that you want to delete this Comment ?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">

                                                        <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                                                        <button class="btn btn-default btn-sm modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </section>
                                        </form>
                                    </div>

<div id="modalAnim2-<?=$rowcom['id']?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                        <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="admin/server/actions.php" method="post" enctype="multipart/form-data">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Edit your Comment ?</h2>
                                            </header>
                                            <div class="panel-body">

                                                    <div class="form-group">

                                                        <div class="col-sm-12">
                                                            <input name="id" type="hidden" id="id" value="<?=$rowcom['id']?>"/>
                                                            <input name="p_id" type="hidden" id="id" value="<?=$rowcom['post_id']?>"/>
                                                            <input name="action" type="hidden"  value="editcomment"/>
                                                            <textarea class="form-control" name="comment" rows="5" maxlength="300" required><?=$rowcom['detail']?></textarea>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top:5px;line-height: 24px;">
                            <input id="input-2c" class="rating" min="0" max="5" value="<?=$rowcom['rating']?>" name="rating" step="0.5" data-size="xs"
           data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa">

                        </div>
                                                    </div>

                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                                                        <button class="btn btn-default btn-sm modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>

                                        </section>
                                        </form>
                                    </div>

<?php
}
?>





                        </div>

                    </div><!-- End review strip -->
                </li>


<?php
}
?>


</ul>



<a class="btn_full" id="loadMore" style="font-size:16px;" >+ Load More +</a>





















  </div>
</div>
        </div><!--End  single_tour_desc-->

        <aside class="col-md-4">
        <p class="hidden-sm hidden-xs">
            <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
        </p>
<div class="box_style_1 expose" style="margin-bottom: 10px">


         <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

            <input class="form hide" type="text" name="id" value="<?=$row['id']?>" />
        <!--    <a type="submit" class="btn_full_outline" style="text-decoration:none;" href="#"><i class=" icon-heart"></i> Add to whislist</a> -->
            <a type="submit" onclick="$(this).closest('form').submit()" class="btn_full_outline" style="text-decoration:none;"><i class=" icon-heart"></i> Add to whislist</a>

        </form>


        </div>


            <div class="box_style_1">



        <div class="widget">
                    <form name="search" method="post" action="search" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="margin-left:0;"><i class="icon-search"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </form>
                </div>
  <br>
        <table class="table table_summary">
            <tr >
                <th colspan="2"><h5><b>Search Category</b></h5></th>
            <tr>
        <tbody>
<?php
//เลือกข้อมูล
$sql="SELECT * FROM category WHERE id!=0 ORDER BY name";
$result=mysqli_query($con,$sql)or die(mysql_error());
$num=mysqli_num_rows($result);

for($i=0;$row=mysqli_fetch_assoc($result);$i++){

?>
<style type="text/css">
tr.other_tours1 td a {


    color: #333;
    text-decoration:none;
}
tr.other_tours1 td a:hover{color:#e04f67}
</style>

            <tr class="other_tours1">
                <td style="width: 70%;">
                    <a href="category-<?=$row['id']?>"><i class="<?=$row['icon']?>"></i> <?=$row['name']?></a>
                </td>
                <td class="text-right">
                    <span class="other_tours_price"><a href="category-<?=$row['id']?>"><?php
                            $sqlNumProduct="SELECT COUNT(*) AS num_product FROM product WHERE category_id=$row[id]";
                            $resultNumProduct=mysqli_query($con,$sqlNumProduct)or die(mysql_error());
                            $rowNumProduct=mysqli_fetch_assoc($resultNumProduct);
                            echo $rowNumProduct['num_product'];
                            ?></a>
                            </span>
                </td>
            </tr>
   <?php
    }
?>
        </tbody>
        </table>

    </div>


    <div class="box_style_1 expose">
        <?php
$sql8="SELECT * FROM banner1 WHERE id!=0 ORDER BY RAND()";
$result8=mysqli_query($con,$sql8)or die(mysql_error());
$row8=mysqli_fetch_assoc($result8);
?>
            <a href="<?=$row8['link']?>" target="_blank">
            <img src="admin/cusimage/<?=$row8['image']?>" class="img-responsive"></a>


        </div><!--/box_style_1 -->



        </aside>
    </div><!--End row -->
    </div><!--End container -->

<?php
include("footer.php");
?>

<div id="toTop"></div><!-- Back to top button -->

<div id="overlay"></div><!-- Mask on input focus -->

 <!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>



<script src="js/functions.js"></script>
<script src="admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="admin/assets/javascripts/ui-elements/examples.modals.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>
 <!-- Specific scripts -->
<script src="js/icheck.js"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <!-- Date and time pickers -->
<?php
    if($_POST['action'] == "true"){
?>
 <script>
     $("#collapseMap").collapse("show");
 </script>
<?php
    }
?>


 <!-- Date and time pickers -->
 <script src="js/bootstrap-datepicker.js"></script>
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
   </script>



    <script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;
    properties = "width="+windowWidth+",height="+windowHeight;
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
    window.open(url,name,properties);
}
</script>
<script src="js/star-rating.js" type="text/javascript"></script>
<script>
$('.dropdown-toggle').dropdown();
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });

        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });

        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true,
                disabled:true
            });
        });




        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });


        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>

<script src="dist/jquery.panzoom.js"></script>
<script>
$("#panzoom").panzoom({
  $zoomIn: $(".zoom-in"),
  $zoomOut: $(".zoom-out"),
  $zoomRange: $(".zoom-range"),
  $reset: $(".reset")
});

$(document).ready(function () {
    size_li = $("#myList li").size();
    x=3;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+3 <= size_li) ? x+3 : size_li;
        $('#myList li:lt('+x+')').show();
    });
    $('#showLess').click(function () {
        x=(x-3<0) ? 3 : x-3;
        $('#myList li').not(':lt('+x+')').hide();
    });
});
</script>


<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '935699479860195',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<script src="https://apis.google.com/js/platform.js" async defer></script>

<script src="admin/assets/vendor/pnotify/pnotify.custom.js"></script>
<script type="text/javascript">

    $('form#cutproduct').on('submit',function(e){
          e.preventDefault();
          var username = $('form#cutproduct input[name=id]').val();

          if(username){
            $.ajax({
              type: "POST",
              async: true,
              url: "wishlist.php",
              data: "id="+username,
              dataType: "jsonp",
           success: function(json){
               if(json.status == 1001) {
               var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
        new PNotify({
            title: 'เสร็จสมบูรณ์',
            text: 'ได้ทำการเพิ่มรายการที่ชื่นชอบเรียบร้อยแล้ว',
            type: 'success',
            addclass: 'stack-bottomright',
            stack: stack_bottomright
        });




                } else {

 new PNotify({
            title: 'ไม่สำเร็จ เสียใจด้วยค่ะ ',
            text: json.msg,
            type: 'error'
        });

                }
              },
              failure: function(errMsg) {
                alert(errMsg.Msg);
              }
            });
          }else{


 new PNotify({
            title: 'ไม่สำเร็จ เสียใจด้วยค่ะ ',
            text: json.msg,
            type: 'error'
        });


          }
        });





    $('form#cutproduct1').on('submit',function(e){
          e.preventDefault();
          var username = $('form#cutproduct1 input[name=remove]').val();

          if(username){
            $.ajax({
              type: "POST",
              async: true,
              url: "wishlist2.php",
              data: "remove="+username,
              dataType: "jsonp",
           success: function(json){
               if(json.status == 1011) {

        new PNotify({
            title: 'เสร็จสมบูรณ์',
            text: 'ได้ทำการลบรายการที่ชื่นชอบเรียบร้อยแล้ว.',
            type: 'success',
            addclass: 'icon-nb'
        });
$(window).scrollTop(0);



                } else {

 new PNotify({
            title: 'ไม่สำเร็จ เสียใจด้วยค่ะ ',
            text: json.msg,
            type: 'error'
        });

                }
              },
              failure: function(errMsg) {
                alert(errMsg.Msg);
              }
            });
          }else{


 new PNotify({
            title: 'ไม่สำเร็จ เสียใจด้วยค่ะ ',
            text: json.msg,
            type: 'error'
        });


          }
        });

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

    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

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
        (function($) {
            $(window).load(function() {
                $('#imagemapper1-wrapper,#imagemapper2-wrapper,#imagemapper3-wrapper,#imagemapper5-wrapper').imageMapper({itemOpenStyle: 'click', itemDesignStyle: 'responsive', pinScalingCoefficient:1, mapOverlay:true, blurEffect:true});
                $('#imagemapper4-wrapper').imageMapper({itemOpenStyle: 'click', itemDesignStyle: 'responsive', pinScalingCoefficient:1, mapOverlay:false, blurEffect:false});
                $('#imagemapper6-wrapper').imageMapper({itemOpenStyle: 'hover', itemDesignStyle: 'responsive', advancedPinOptions:true, pinScalingCoefficient:1, categories:true, showAllCategory:true});
            });
        })(jQuery);
    </script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72009222-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
