<?php
session_start();
include('admin/server/connect.php');

if (isset($_GET['action']) AND $_GET['action']=="fblogin" && isset($_SESSION['redir_after_auth'])) {
    header('Location: ' . $_SESSION['redir_after_auth']);
}

$sqlset="SELECT * FROM setting";
$resultset=mysqli_query($con,$sqlset);
$rowset=mysqli_fetch_assoc($resultset);

$sqlset_head="SELECT * FROM head_text";
$resultset_head=mysqli_query($con,$sqlset_head);
$rowset_head=mysqli_fetch_assoc($resultset_head);


$sqlsum="SELECT * FROM product";
$resultsum=mysqli_query($con,$sqlsum);
$numsum=mysqli_num_rows($resultsum);

?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <META https-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META https-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TeeneeJJ (ที่นี่เจเจ) เป็นเว็บไซต์และแอปพลิเคชันในไทย ในเรื่องร้านขายสินค้า">
    <meta name="author" content="TeeneeJJ">
    <meta property="fb:app_id" content="935699479860195" />
    <meta property="og:site_name" content="teeneejj">
    <meta property='og:description' content='ร้านค้าและสินค้า ในตลาดนัดสวนจตุจักร'>
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.teeneejj.com/admin/cusimage/homepage-share.jpg"/>
    <title>TEENEEJJ - ตลาดนัดสวนจตุจักร</title>
    <!-- Favicons-->

    <link rel="shortcut icon" type="image/png" href="img/apple-touch-icon-57x57-precomposed.png?m=<?=time()?>"/>

    <!-- CSS -->
    <link href="css/base.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/skins/square/grey.css" rel="stylesheet">
    <link href="css/date_time_picker.css" rel="stylesheet">
    <link href="css/flagicon.css" rel="stylesheet">
    <link href="css/menuresponsive.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/vendor/pnotify/pnotify.custom.css">
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="jssor.slider.devpack/js/jssor.slider.mini.js" type="text/javascript"></script>
    <!-- Google web fonts -->
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
   <link href="css/review.css" rel="stylesheet" type="text/css"/>
   <link href="slick-1.5.9/slick/slick.css" rel="stylesheet" type="text/css"/>
   <link href="slick-1.5.9/slick/slick-theme.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
        <style type="text/css">

        .alert-danger{
            background: #e41f1c;
            color: rgba(255, 255, 255, 0.7);
        }
        .alert-success{
          background: #47a447;
          color: rgba(255, 255, 255, 0.7);
        }

.ui-pnotify .notification .ui-pnotify-title {
    font-size: 14px;
    letter-spacing: 0;
}
.ui-pnotify .notification .ui-pnotify-icon {
    left: 0;
    position: absolute;
    top: 0;
    width: 75px;
    text-align: center;
}
.col-md-3.wow{
    padding-left: 5px;
    padding-right: 5px;
}
.wishlist{
    top:0px;

}
.short_info a{
    color:white;
    font-size: medium;
}
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #f5f5f5;
  /* change if the mask should have another color then white */
  z-index: 99;
  /* makes sure it stays on top */
}

#status {
  position: absolute;
  left: 50%;
  /* centers the loading animation horizontally one the screen */
  top: 50%;
  /* centers the loading animation vertically one the screen */
  /* is width and height divided by two */
}

.spinner-sm {
  width: 70px;
  height: 70px;
  background-image: url(https://www.teeneejj.com/img/apple-touch-icon-57x57-precomposed.png);
  background-size: 40%;
  background-position: center center;
  background-repeat: no-repeat;
  background-color: #15b1a6;
  border-radius: 50%;
}
.spinner-sm:after,
.spinner-sm:before {
  content: '';
  display: block;
  width: 70px;
  height: 70px;
  border-radius: 50%;
}
.spinner-sm-1:after {
  position: absolute;
  top: -1px;
  left: -1px;
  border: 4px solid transparent;
  border-top-color: #214577;
  border-bottom-color: #214577;
  animation: spinny 0.8s linear infinite;
}
@keyframes spinny {
  0% {
    transform: rotate(0deg) scale(1);
  }
  50% {
    transform: rotate(90deg) scale(1.2);
  }
  100% {
    transform: rotate(360deg) scale(1);
  }
}
@keyframes spinny {
  0% {
    transform: rotate(0deg) scale(1);
  }
  50% {
    transform: rotate(90deg) scale(1.2);
  }
  100% {
    transform: rotate(360deg) scale(1);
  }
}
</style>
<script>
     jQuery(document).ready(function ($) {

//        var options = {$AutoPlay: true,$Idle:8000};
//        var jssor_slider1 = new $JssorSlider$('slider1_container', options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales
        //while window resizing
//        function ScaleSlider() {
//            var parentWidth = $('#slider1_container').parent().width();
//            if (parentWidth) {
//                jssor_slider1.$ScaleWidth(parentWidth);
//            }
//            else
//                window.setTimeout(ScaleSlider, 30);
//        }
        //Scale slider after document ready
//        ScaleSlider();

        //Scale slider while window load/resize/orientationchange.
//        $(window).bind("load", ScaleSlider);
//        $(window).bind("resize", ScaleSlider);
//        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
<script>
    $(function (){
        if($('div').hasClass("all_block")){
            $(".btn_review").show();
            $(".margin-auto").show();
        }else{
            $(".btn_review").hide();
            $(".margin-auto").hide();
        }
    });
</script>
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

  <!--  <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>  -->
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

     <!-- Header================================================== -->
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




     </style>




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
                                    <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/en"><img src="images/icons/us.png" /> ENG</a></li>
                                    <li style="display: inline-block">|</li>
                                    <li style="display: inline-block"><a style="color: white;" href="https://www.teeneejj.com/cn"><img src="images/icons/cn.png" width="16px" height="11px"/> 中文</a></li>
                                </ul>
                            </div>
                            <div id="head_footer">
                                <ul id="top_links1">
                                    <li><a href="<?=$rowset['facebook']?>"><i class="icon-facebook"></i></a></li>
                                    <li><a href="<?=$rowset['twitter']?>"><i class="icon-twitter"></i></a></li>
                                    <li><a href="<?=$rowset['google_plus']?>"><i class="icon-google"></i></a></li>
                                    <li><a href="<?=$rowset['instagram']?>"><i class="icon-instagram"></i></a></li>
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
                        <a href="https://www.teeneejj.com/"><img src="img/logo.png" height="54" alt="TEENEEJJ" data-retina="true" class="logo_normal"></a>
                        <a href="https://www.teeneejj.com/"><img src="img/logo_sticky.png" height="54" alt="TEENEEJJ" data-retina="true" class="logo_sticky"></a>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <div class="lang-mobile">
                        <ul style="list-style-type: none;display: inline-block;">
                            <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/">ไทย</a></li>
                            <li style="display: inline-block">|</li>
                            <li style="display: inline-block"><a style="color: #0a5579;" href="https://www.teeneejj.com/en">ENG</a></li>
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

<section id="search_container" style="background:#4d536d url(admin/cusimage/<?=$rowset['index_image']?>) no-repeat center top;">
 	<div id="search">


                    <div class="tab-content">

                        <form name="search" method="get" action="search" >
                        <div class="tab-pane active" id="tours">
                        <h3 style="color:#444444; float:left;" >ค้นหาสิ่งที่ต้องการ ใน ตลาดนัดสวนจตุจักร</h3>
                        	<div class="row">
                            	<div class="col-md-12">
                                	<div class="form-group">

                                        <input type="text" class="form-control" id="firstname_booking" name="search"  placeholder="ค้นหาสิ่งที่ต้องการในจตุจักร..." required>
                                    </div>
                                </div>

                            </div><!-- End row -->
                            <!-- End row -->

                            <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
                        </div><!-- End rab -->
                       </form>


                    </div>
	</div>
</section><!-- End hero -->

<div class="container margin_60" style="background: #fff;">

        <div class="main_title">
            <h2 class="thai_font"><?=$rowset_head['head_th']?></h2>
            <p style="font-size: 28px;"> <?=$rowset_head['detail_th']?></p>
        </div>

        <div class="row">

<?php
//เลือกข้อมูล
//$keyword=isset($_REQUEST['keyword'])?$_REQUEST['keyword']:'';
//$sql="SELECT category.id AS catgory_id, category.name AS category_name, category.icon AS category_icon, product.id AS id, product.name AS name, product.detail AS detail, product.price AS price, product.rating AS rating, product.view AS view, product.normal_price AS normal_price, product.image AS image, product.status AS status, product.insert_date AS insert_date FROM category RIGHT JOIN product ON product.category_id=category.id WHERE product.first = 1 ORDER BY product.id DESC LIMIT 4";
//$result=mysqli_query($sql)or die(mysql_error());
//
//for($i=0;$row=mysqli_fetch_assoc($result);$i++){

?>


<!--            <div class="col-md-3 col-sm-6 wow zoomIn " data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="img_container">
                        <a href="shop-<?=$row['id']?>">
                        <img src="admin/cusimage/<?=$row['image']?>" class="img-responsive" alt="">
                        <div class="ribbon popular"></div>
                        <div class="short_info">
                            <i class="<?=$row['category_icon']?>"></i><?=$row['category_name']?>
                        </div>
                        </a>
                    </div>
                    <div class="tour_title">
                        <h3><strong><?=$row['name']?></h3>
                        <div class="rating">-->
<?php
//for($i=1;$i <= $row['rating'];$i++){
?>

                            <!--<i class="icon-star voted"></i>-->
    <?php
//    }
    ?>

<?php
//$total = 5;
//$total -= $row['rating'];

//for($i=1;$i <= $total;$i++){
?>

                           <!--<i class="icon-star-empty"></i>-->
    <?php
//    }
    ?>




                            <!--<small>(<?=$row['view']?>)</small>-->
                        <!--</div> end rating -->
                        <!--<div class="wishlist">-->


<!--<form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

            <input class="user_id form hide" type="text" name="id" value="<?=$row['id']?>" />
                <a class="tooltip_flip tooltip-effect-1" >
                    +<span class="tooltip-content-flip">
                    <span class="tooltip-back">Add to wishlist</span></span></a>
</form>-->




                             <!--</div> End wish list-->
                    <!--</div>-->
                <!--</div> End box tour -->
            <!--</div> End col-md-4 -->

    <?php
//    }
    ?>



<?php
//เลือกข้อมูล
$keyword=isset($_REQUEST['keyword'])?$_REQUEST['keyword']:'';
//$sql="SELECT category.id AS catgory_id, category.name AS category_name, category.icon AS category_icon, product.id AS id, product.name AS name, product.detail AS detail, product.price AS price, product.rating AS rating, product.view AS view, product.normal_price AS normal_price, product.image AS image, product.status AS status, product.insert_date AS insert_date FROM category RIGHT JOIN product ON product.category_id=category.id WHERE product.rating = 5 ORDER BY RAND() DESC LIMIT 8";
$sql="SELECT category.id AS catgory_id, category.name AS category_name, category.icon AS category_icon, product.id AS id, product.name AS name, product.detail AS detail, product.price AS price, product.rating AS rating, product.view AS view, product.normal_price AS normal_price, product.image AS image, product.status AS status, product.insert_date AS insert_date FROM category RIGHT JOIN product ON product.category_id=category.id WHERE product.first = 1 ORDER BY product.priority LIMIT 12";
$result=mysqli_query($con,$sql);

for($i=0;$row=mysqli_fetch_assoc($result);$i++){

?>


            <div class="col-md-3 col-sm-6 wow zoomIn " data-wow-delay="0.1s">
                <div class="tour_container">
                    <div class="img_container">
                        <a href="shop-<?=$row['id']?>">
                            <img src="admin/cusimage/<?=$row['image']?>" class="img-responsive" style="min-height:245px;" alt="">
                        <?php
                            if($i<=3){
                                echo "<div class=\"ribbon popular\"></div>";
                            }else{
                                echo "<div class=\"ribbon top_rated\"></div>";
                            }
                        ?>

                        <div class="short_info">
                            <!-- <i class="<?=$row['category_icon']?>"></i><?=$row['category_name']?>-->
                            <?=$row['name']?>
                            <div class="wishlist">
                                <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

                                            <input class="user_id form hide" type="text" name="id" value="<?=$row['id']?>" />
                                                <a class="tooltip_flip tooltip-effect-1" >
                                                    +<span class="tooltip-content-flip">
                                                    <span class="tooltip-back">Add to wishlist</span></span></a>
                                </form>
                             </div>
                        </div>
                        </a>
                    </div>
<!--                    <div class="tour_title">
                        <h3>< strong><?=$row['name']?></h3>
                        <div class="rating">
<?php
//for($i=1;$i <= $row['rating'];$i++){
?>

                            <i class="icon-star voted"></i>
    <?php
//    }
    ?>

<?php
$total = 5;
$total -= $row['rating'];

//for($i=1;$i <= $total;$i++){
?>

                           <i class="icon-star-empty"></i>
    <?php
//    }
    ?>




                            <small>(<?=$row['view']?>)</small>
                        </div> end rating
                        <div class="wishlist">


<form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

            <input class="user_id form hide" type="text" name="id" value="<?=$row['id']?>" />
                <a class="tooltip_flip tooltip-effect-1" >
                    +<span class="tooltip-content-flip">
                    <span class="tooltip-back">Add to wishlist</span></span></a>
</form>




                             </div> End wish list
                    </div>-->
                </div><!-- End box tour -->
            </div><!-- End col-md-4 -->

    <?php
    }
    ?>





        </div><!-- End row -->

<p class="text-center nopadding">
            <a href="view.php" class="btn_1 medium"><i class="icon-eye-7"></i>เข้าชมแผงค้าทั้งหมด (<?=$numsum?>) </a>
        </p>
         <br><br>
<!--        <div class="main_title">
            <h2 class="thai_font">สินค้าใหม่<span>ไม่เหมือนใคร</span></h2>
            <br>
            <p>สินค้าใหม่เปลี่ยนทุกวันจันทร์ สั่งซื้อได้ก่อนใคร สะดวกรวดเร็ว</p>
        </div>
  </div></div> --><!-- End container -->
    <!-- ส่วนที่ดึงสินค้ามาแสดงจาก เว็บซ้อปปิ้ง-->

    <!--         <?php
include("ifram/show.html");
?> -->
</div>


    <div class="white_bg" style="background: #f9f9f9;">
      <div class="container margin_60">
        <div class="row">
          <div class="col-md-6">

            <div class="feature_home" style="margin-bottom: 0px;">

                        <p style="font-size: 18px;">
                         <span  style="font-weight: 700; color: #e04f67;">สำหรับผู้ต้องการทำธุรกิจ</span> ต้องการสินค้าจำนวนมาก<br> เรามีสินค้ากว่า 300,000 ชนิด <br>เตรียมไว้ให้คุณในราคาที่เหมาะสม
                         <h3 style="margin-bottom: 0px; margin-top: 10px;"><span>แล้วเราจะรีบติดต่อกลับ</span><h3>
                       </p>
                       <br>

                       <style>
                       .input-group a {
                            background-color: #333;
                            color: #fff;
                            border-color: #333;
                        }
                        .input-group a:hover {
                             background-color: #e04f67;
                             color: #fff;
                             border-color: #e04f67;
                         }
                       </style>

                       <form id="add_subscribe" method="get" >
            							<div class="input-group">
            								<input type="text" id="subscribe_email" name="email" placeholder="Enter your Email" class="form-control style-2" required>

            								<!-- Write here your end point -->
            								<span  class="input-group-btn">
                					<a  class="btn add_subscribe_btn" id="add_subscribe_btn"  style="margin-left:0;">Get Subscribe</a >
                					</span>
                							</div>
            							<!-- /input-group -->
            						</form>


                  </div>

          </div>


          <div class="col-md-6">

            <div class="" style="margin-bottom: 0px;">


                         <h2 style="font-weight: 700; font-size: 25px; margin-top: 0px; "><span>อยากจะได้สินค้าอะไร บอกเรา เราหาให้</span></h2>

                       <br>

                       <form id="add_message"  method="get" target="_blank">

                         <div class="input-group input-group-icon" >
														<span class="input-group-addon">
															<span class="icon"><i class="icon-cart "></i></span>
														</span>
														<input type="text" class="form-control" id="con_product" name="product" placeholder="สินค้าที่ต้องการ" required>
													</div>


                          <div class="input-group input-group-icon" style="margin-top: 17px;">
 														<span class="input-group-addon">
 															<span class="icon"><i class="icon-mail-7"></i></span>
 														</span>
 														<input type="text" class="form-control" id="con_email" name="email" placeholder="อีเมล์ติดต่อกลับ" required>
 													</div>

                          <div class="input-group input-group-icon" style="margin-top: 17px;">
 														<span class="input-group-addon">
 															<span class="icon"><i class="icon-phone-3"></i></span>
 														</span>
 														<input type="text" class="form-control" id="con_tel" name="tel" placeholder="เบอร์โทรติดต่อกลับ" required>
 													</div>
                          <br>
                          <a id="add_message_btn" class="btn_1 add_message_btn">ส่งข้อมูล</a>
                        </form>


                  </div>


          </div>

        </div>
      </div>
    </div>





    <div class="container margin_60" >
    <div class="row add_bottom_30 margin-auto">

      <div class="main_title">
            <h2 class="thai_font">ชุมชน<span>ของเรา</span></h2>
        </div>

<?php

function readMore($str,$r_id){
    if(strlen($str) > 200){
        echo substr($str, 0,200)."... "."<a href=\"inreview.php?rev_id=$r_id\">อ่านต่อ</a>";
    }else{
        echo $str;
    }
}

$sql_review="SELECT review.ID as review_id,review.user_id as user_id , review.img_review as img_review , review.create_date as create_date ,review.caption as caption,review.shop_name as shop_name,user.picture as user_picture,user.username as user_username From reviews as review INNER JOIN users as user ON review.user_id = user.id ORDER BY review.create_date desc LIMIT 3";
$result_review=mysqli_query($con,$sql_review);

for($i=0;$row=mysqli_fetch_assoc($result_review);$i++){
?>
    <div class="block all_block" >
      <div class="image" style="background-color: #eaeaea;">
        <a href="inreview.php?rev_id=<?=$row["review_id"]?>" class="img" rel="">
            <img src="admin/rev_img/<?=$row["img_review"]?>" class="" style="display: inline; width:100%;">
        </a>
      </div>
      <div class="info">
        <a href="inreview.php?usr_id=<?=$row["user_id"]?>">
          <img src="<?=$row["user_picture"]?>" style=" float: left; margin-right: 10px; width: 32px; height: 32px;">
        </a>
        <span class="detail">
          <strong>รูปภาพโดย </strong>
          <a href="inreview.php?usr_id=<?=$row["user_id"]?>" class="author"><?=$row["user_username"]?></a><br>
            <span class="date-checkin"><?=$row["create_date"]?></span>
        </span>
      </div>
      <div class="details">
          <p><?= readMore($row["caption"],$row["review_id"])?></p>
      </div>
      <div class="meta">
        <div class="comment">
            <a href="search.php?search=<?=$row["shop_name"]?>" class="comments" target="_blank"><span class="title_comment"><?=$row["shop_name"]?></span></a>
<!--            <a href="#" class="like" ><span class="likes"> LIKE 0</span></a>     -->
            <a style="float:right;padding-right: 10px;text-decoration: none;" href="javascript:shareFacebook(<?=$row["review_id"]?>);"><span class="fa fa-facebook-f fa-2x" style="font-size: 1.5em"></span></a>
        </div>
      </div>
  </div>
<?php
}
?>
<!--    <div class="block all_block">
      <div class="image" style="background-color: #eaeaea;">
        <a href="#" target="_blank" class="img" rel="">
          <img src="admin/cusimage/1446995520-1446993263-IMG_2167.jpg" class="" style="display: inline; width:368px;">
        </a>
      </div>
      <div class="info">
        <a href="#">
          <img src="httpss://scontent.fbkk6-1.fna.fbcdn.net/hphotos-xta1/t31.0-8/12698431_10205445448478362_2074491253371195326_o.jpg" style=" float: left; margin-right: 10px; width: 32px; height: 32px;">
        </a>
        <span class="detail">
          <strong>รูปภาพโดย </strong>
          <a href="#" class="author">PUCHONG KAEWJAI</a><br>
            <span class="date-checkin"> 22 พฤศจิกายน 2552</span>
        </span>
      </div>
      <div class="details">
          <p>Just on the  street</p>
      </div>
      <div class="meta">
        <div class="comment">
            <a href="#" class="comments" target="_blank"><span class="title_comment">0</span> ความคิดเห็น</a>
            <a href="#" class="like" ><span class="likes"> LIKE 0</span></a>
        </div>
      </div>
  </div>-->
<!--    <div class="block all_block">
      <div class="image" style="background-color: #eaeaea;">
        <a href="#" target="_blank" class="img" rel="">
          <img src="admin/cusimage/1446995520-1446993263-IMG_2167.jpg" class="" style="display: inline; width:368px;">
        </a>
      </div>
      <div class="info">
        <a href="#">
          <img src="httpss://scontent.fbkk6-1.fna.fbcdn.net/hphotos-xta1/t31.0-8/12698431_10205445448478362_2074491253371195326_o.jpg" style=" float: left; margin-right: 10px; width: 32px; height: 32px;">
        </a>
        <span class="detail">
          <strong>รูปภาพโดย </strong>
          <a href="#" class="author">PUCHONG KAEWJAI</a><br>
            <span class="date-checkin"> 22 พฤศจิกายน 2552</span>
        </span>
      </div>
      <div class="details">
          <p>Just on the  street</p>
      </div>
      <div class="meta">
        <div class="comment">
            <a href="#" class="comments" target="_blank"><span class="title_comment">0</span> ความคิดเห็น</a>
            <a href="#" class="like" ><span class="likes"> LIKE 0</span></a>
        </div>
      </div>
  </div>-->

            </div>
        <div class="row btn_review" style="display:block;"><p class="text-center nopadding"><a href="allreview.php" class="btn_1 medium">ดู review ทั้งหมด</a></p></div>
    </div>
    <div class="white_bg" style="background: #f9f9f9;">
        <div class="container margin_60">
            <div class="main_title">
                <h2> เว็บไซต์<span>ที่นี่เจเจ</span> </h2>
                <p>
                   รวบรวมร้านค้าที่คัดเลือดมาแล้วอย่างดี จากทั้งหมด 8,000 ร้านค้า
                </p>
            </div>

            <div class="row add_bottom_45">


<?php
//เลือกข้อมูล
$sql="SELECT * FROM category WHERE id!=0 ORDER BY name";
$result=mysqli_query($con,$sql);

for($i=0;$row=mysqli_fetch_assoc($result);$i++){

?>


                <div class="col-md-4 other_tours">
                    <ul>
                        <li><a href="category-<?=$row['id']?>"><i class="<?=$row['icon']?>"></i><?=$row['name']?>

                            <span class="other_tours_price"><?php
                            $sqlNumProduct="SELECT COUNT(*) AS num_product FROM product WHERE category_id=$row[id]";
                            $resultNumProduct=mysqli_query($con,$sqlNumProduct);
                            $rowNumProduct=mysqli_fetch_assoc($resultNumProduct);
                            echo $rowNumProduct['num_product'];
                            ?>
                            </span>


                        </a></li>
                    </ul>
                </div>


<?php
    }



?>



            </div><!-- End row -->

 <?php
$sql8="SELECT * FROM banner WHERE id!=0 ORDER BY RAND() DESC LIMIT 2";
$result8=mysqli_query($con,$sql8);


?>
            <div class="row add_bottom_30">
                <?php
//for($i=0;$row8=mysqli_fetch_assoc($result8);$i++){
                ?>
<!--                <div class="col-md-6">
                 <a href="<?=$row8['link']?>" target="_blank">
                <img src="admin/cusimage/<?=$row8['image']?>" class="img-responsive styled" style="margin: 0 auto;" /></a>
            </div>-->
            <?php
//        }
        ?>
                <div id="slider1_container" class="single-item">
                    <!-- Slides Container -->
                         <?php
                            for($i=0;$row8=mysqli_fetch_assoc($result8);$i++){
                        ?>
                    <div><a href="<?=$row8['link']?>" target="_blank"><img src="admin/cusimage/<?=$row8['image']?>" style="max-width: 100%;height: auto;"/></a></div>
                        <?php
                        }
                        ?>
                    <!-- Trigger -->
                </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 text-center">
<?php
$sql="SELECT news_subject_guest FROM setting";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
                    <p>
                        <a href="history"><img src="admin/cusimage/<?=$row['news_subject_guest']?>" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                    </p>
                    <h4><span>ประวัติความเป็นมาประวัติ</span> </h4>
                    </div>
                <div class="col-md-4 col-sm-6 text-center">
<?php
$sql="SELECT news_detail_guest FROM setting";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>

                    <p>
                        <a href="directions"><img src="admin/cusimage/<?=$row['news_detail_guest']?>" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                    </p>
                    <h4><span>การเดินทางมายังตลาดนัดจตุจักร</span></h4>

                </div>
                <div class="col-md-4 col-sm-6 text-center">
<?php
$sql="SELECT stats_display FROM setting";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
                    <p>
                        <a href="article"><img src="admin/cusimage/<?=$row['stats_display']?>" alt="Pic" class="img-responsive" style="margin-left: auto;margin-right: auto;"></a>
                    </p>
                    <h4><span>บทความน่ารู้</span> </h4>

                </div>

            </div><!-- End row -->
        </div><!-- End container -->
    </div><!-- End white_bg -->

    <section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1 magnific">
        <div>
            <h3>ตลาดนัดสวนจตุจักร</h3>
            <p>แหล่งรวบรวมสินค้าสำหรับคนทุกเพศทุกวัย เช่น เสื้อผ้า เครื่องประดับ สินค้าพื้นเมือง เครื่องจักสาน เฟอร์นิเจอร์ ไปจนถึงสัตว์เลี้ยง นอกจากนี้ยังจัดบริเวณเฉพาะสำหรับร้านค้าพันธุ์ไม้ดอกไม้ประดับชนิดต่างๆ ที่ใหญ่ที่สุดแห่งหนึ่งในกรุงเทพมหานคร</p>
            <a href="<?=$rowset['youtube']?>" class="video"><i class="icon-play-circled2-1"></i></a>
        </div>
    </div>
    </section><!-- End section -->

    <div class="container margin_60">

        <div class="main_title">
            <h2 style="    font-family: "Montserrat",Arial,sans-serif;">เหตุผลที่ต้องเป็นเรา - <span>Why us ?</span></h2>
            <p>
                มั่นใจได้ว่าท่านจะได้รับข้อมูลล่าสุดจากเราตลอดเวลา
            </p>
        </div>

        <div class="row">

            <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-41"></i>
                    <h3><span>+ 8000</span> แผงค้า</h3>
                    <p>

                         <?=mb_substr(strip_tags($rowset['why']),0,130,'UTF-8')?>
                    </p>
                    <a href="WHY_US" class="btn_1 outline">Read more</a>
                </div>
            </div>

            <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-30"></i>
                    <h3><span>+1M</span> สำหรับผู้เข้าชม</h3>
                    <p>
                         <?=mb_substr(strip_tags($rowset['cusdata']),0,130,'UTF-8')?>
                    </p>
                    <a href="WHY_US" class="btn_1 outline">Read more</a>
                </div>
            </div>

            <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-57"></i>
                    <h3><span>H24 </span> Support</h3>
                    <p>
                         หากมีข้อผิดพลาดประการใด หรือคำแนะนำเกี่ยวกับเว็บไซต์นี้ สามารถแจ้งในส่วนของ Contact ในหน้าติดต่อนี้ได้เลยครับ
                    </p>
                    <a href="contact_us" class="btn_1 outline">Read more</a>
                </div>
            </div>

        </div><!--End row -->





    </div><!-- End container -->


	    <?php
include("footer.php");
?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->

<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>




 <script src="admin/assets/vendor/pnotify/pnotify.custom.js"></script>
 <script src="slick-1.5.9/slick/slick.min.js" type="text/javascript"></script>



 <script type="text/javascript">

 $('.add_subscribe_btn').click(function(e){
       e.preventDefault();
     //  var username = $('form#cutproduct input[name=id]').val();


     var $form = $(this).closest("form#add_subscribe");
     var formData =  $form.serializeArray();


     var email =  $form.find("#subscribe_email").val();

     $( "body" ).prepend( '<div id="preloader"><div class="spinner-sm spinner-sm-1" id="status"> </div></div>' );
      $(window).on('load', function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});

      })


       if(email){
         $.ajax({
           type: "POST",
           url: "admin/server/add_subscribe.php",
           data: "email="+email,
           dataType: "jsonp",
        success: function(json){

            if(json.status == 1001) {


               $("#subscribe_email").val('');

                 $('#preloader').delay(3500).hide();
            var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
     new PNotify({
         title: 'ส่งข้อความสำเร็จ',
         text: 'แล้วเราจะรีบติดต่อกลับไป',
         type: 'success',
         addclass: 'stack-bottomright',
         stack: stack_bottomright
     });




             } else {

               $('#preloader').delay(3500).hide();


 var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
 new PNotify({
         title: 'ส่งข้อความไม่สำเร็จ',
         text: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วย',
         type: 'error',
         addclass: 'stack-bottomright',
         stack: stack_bottomright
     });

             }
           },

           failure: function(errMsg) {
             alert(errMsg.Msg);
           }
         });
       }else{

         $('#preloader').delay(3500).hide();
         var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
         new PNotify({
                 title: 'ส่งข้อความไม่สำเร็จ',
                 text: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วย',
                 type: 'error',
                 addclass: 'stack-bottomright',
                 stack: stack_bottomright
             });



       }

     });


 </script>


<script type="text/javascript">

$('.add_message_btn').click(function(e){
      e.preventDefault();
    //  var username = $('form#cutproduct input[name=id]').val();


    var $form = $(this).closest("form#add_message");
    var formData =  $form.serializeArray();

    var product =  $form.find("#con_product").val();
    var email =  $form.find("#con_email").val();
    var tel =  $form.find("#con_tel").val();

    $( "body" ).prepend( '<div id="preloader"><div class="spinner-sm spinner-sm-1" id="status"> </div></div>' );
     $(window).on('load', function() { // makes sure the whole site is loaded
       $('#status').fadeOut(); // will first fade out the loading animation
       $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
       $('body').delay(350).css({'overflow':'visible'});

     })

      if(email){
        $.ajax({
          type: "POST",
          url: "admin/server/add_message.php",
          data: "product="+product+"&email="+email+"&tel="+tel,
          dataType: "jsonp",
       success: function(json){

           if(json.status == 1001) {

             $("#con_product").val('');
              $("#con_email").val('');
              $("#con_tel").val('');

              $('#preloader').delay(3500).hide();

           var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
    new PNotify({
        title: 'ส่งข้อความสำเร็จ',
        text: 'แล้วเราจะรีบติดต่อกลับไป',
        type: 'success',
        addclass: 'stack-bottomright',
        stack: stack_bottomright
    });




            } else {

              $('#preloader').delay(3500).hide();

var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
new PNotify({
        title: 'ส่งข้อความไม่สำเร็จ',
        text: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วย',
        type: 'error',
        addclass: 'stack-bottomright',
        stack: stack_bottomright
    });

            }
          },
          failure: function(errMsg) {
            alert(errMsg.Msg);
          }
        });
      }else{


        $('#preloader').delay(3500).hide();


        var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
        new PNotify({
                title: 'ส่งข้อความไม่สำเร็จ',
                text: 'กรุณากรอกข้อมูลให้ครบถ้วนด้วย',
                type: 'error',
                addclass: 'stack-bottomright',
                stack: stack_bottomright
            });


      }
    });


</script>

<script type="text/javascript">
    $(document).ready(function(){
       $('.single-item').slick({
           autoplay:true,
           arrows: false
       });
    });

    $('.tooltip_flip.tooltip-effect-1').click(function(e){
          e.preventDefault();
        //  var username = $('form#cutproduct input[name=id]').val();


        var $form = $(this).closest("form#cutproduct");
        var formData =  $form.serializeArray();
        var userId =  $form.find(".user_id").val();

          if(userId){
            $.ajax({
              type: "POST",
              url: "wishlist.php",
              data: "id="+userId,
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
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
 new PNotify({
            title: 'ไม่สำเร็จ เสียใจด้วยค่ะ ',
            text: json.msg,
            type: 'error',
            addclass: 'stack-bottomright',
            stack: stack_bottomright
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

<script type="text/javascript">
    function shareFacebook(rev_id){
                        FB.ui({
                            display: 'popup',
                            method: 'share',
                            href: 'https://www.teeneejj.com/inreview.php?rev_id='+rev_id ,
                          }, function(response){});
                    }
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
