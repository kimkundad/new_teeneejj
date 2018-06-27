<?php
session_start();
include('admin/server/connect.php');


$sqlset="SELECT * FROM setting";
$resultset=mysqli_query($con,$sqlset)or die(mysql_error());
$rowset=mysqli_fetch_assoc($resultset);

$num_col=1;
$num_row=6;
$page_size=$num_col*$num_row;
//กำหนดค่าเริ่มต้น
$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
$page=$page-1;
$search=isset($_REQUEST['search'])?$_REQUEST['search']:'';
$search=str_replace("_", " ", $search);
$str = explode(" ", $search);
$arrlenght = count($str);
$search_multi = " OR detail like '%$search%' OR name_en like '%$search%' OR name_cn like '%$search%' OR detail_en like '%$search%' OR detail_cn like '%$search%' OR keyword_en like '%$search%' OR keyword2_en like '%$search%' OR keyword_cn like '%$search%' OR keyword2_en like '%$search%'";

$rating=$_REQUEST['rating'];
if($rating==""){$rating=0;}





$review1[] = array();
$review=$_REQUEST['review'];
if($review==""){$review1[0]=0; $review1[1]=0;}
if($review=="Superb"){$review1[0]=1000; $review1[1]=1000000;}
if($review=="Very_good"){$review1[0]=750; $review1[1]=999;}
if($review=="Good"){$review1[0]=500; $review1[1]=749;}
if($review=="Pleasant"){$review1[0]=250; $review1[1]=499;}
if($review=="No_rating"){$review1[0]=0; $review1[1]=249;}

$buy[] = array();
$buy1=$_REQUEST['result'];
if($buy1==""){$buy1=110;}
if($buy1==1){$buy[0]=0; $buy[1]=100;}
if($buy1==2){$buy[0]=100; $buy[1]=2000000;}
if($buy1==3){$buy[0]=200; $buy[1]=500;}
if($buy1==4){$buy[0]=500; $buy[1]=1000;}
if($buy1==5){$buy[0]=1000; $buy[1]=2500;}
if($buy1==6){$buy[0]=2500; $buy[1]=10000000;}




if($rating == 0 && $review == "" && $buy1==110){
//หาจำนวนหน้า
$sql="SELECT COUNT(*) FROM product WHERE name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result);
$num=$row['COUNT(*)'];
$numSearch=$num;

//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ORDER BY rating DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$numz=mysqli_num_rows($result);

}






if($rating == 0 && $review == "" && $buy1!=110){
//หาจำนวนหน้า
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND endprice BETWEEN $buy[0] AND $buy[1] ORDER BY rating DESC";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result);
$num=$row['COUNT(*)'];
$numSearch=$num;

//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND endprice BETWEEN $buy[0] AND $buy[1] ORDER BY rating DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$numz=mysqli_num_rows($result);

}








 if($rating != 0 && $review == "" && $buy1==110){

//หาจำนวนหน้า
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND rating=$rating";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result);
$num=$row['COUNT(*)'];
$numSearch=$num;

//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND rating=$rating ORDER BY rating DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$numz=mysqli_num_rows($result);

 }

 if($rating == 0 && $review != "" && $buy1==110){

//หาจำนวนหน้า
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND view BETWEEN $review1[0] AND $review1[1] ORDER BY rating DESC";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result);
$num=$row['COUNT(*)'];
$numSearch=$num;

//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND view BETWEEN $review1[0] AND $review1[1] ORDER BY rating DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$numz=mysqli_num_rows($result);

 }













?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TeeneeJJ (ที่นี่เจเจ) เป็นเว็บไซต์และแอปพลิเคชันในไทย ในเรื่องร้านขายสินค้า">
    <meta name="author" content="TeeneeJJ">
    <title>TEENEEJJ - ตลาดนัดสวนจตุจักร</title>

    <!-- Favicons-->
    <link rel="shortcut icon" type="image/png" href="img/apple-touch-icon-57x57-precomposed.png?m=<?=time()?>"/>

    <!-- CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/base.css" rel="stylesheet">

    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/vendor/pnotify/pnotify.custom.css">

    <!-- Google web fonts -->
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
   <link href="css/menuresponsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- Slick.js -->
    <link href="slick-1.5.9/slick/slick.css" rel="stylesheet" type="text/css"/>
    <link href="slick-1.5.9/slick/slick-theme.css" rel="stylesheet" type="text/css"/>


    <!-- REVIEW -->
    <link href="css/review.css" rel="stylesheet" type="text/css"/>
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

 .main_title h2{
    font: normal normal normal 37px / 43px "Open Sans", Helvetica, Arial, Verdana, sans-serif;
}

@media screen and (max-width: 640px) {

  .all_block{
    margin-left: 7px!important;
  }
}
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
                        <a href="https://www.teeneejj.com/"><img src="img/logo.png" height="54" alt="TEENEEJJ" data-retina="true" class="logo_normal"></a>
                        <a href="https://www.teeneejj.com/"><img src="img/logo_sticky.png" height="54" alt="TEENEEJJ" data-retina="true" class="logo_sticky"></a>
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


<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1><?=$search?></h1>
        <p>แสดงรายการของร้านค้าทั้งหมดของ ที่นี่เจเจ ที่ท่านได้ค้าหาไว้ก่อนหน้านี้แล้ว</p>
        </div>
    </div>
</section><!-- End section -->

<div id="position">
    	<div class="container">
                	<ul>
                    <li><a href="https://www.teeneejj.com">Home</a></li>
                    <li><a href="#">YOUR WISHLIST</a></li>

                    </ul>
        </div>
    </div><!-- Position -->

<div class="collapse" id="collapseMap">
	<div id="map" class="map">

    </div>
</div><!-- End Map -->

<div  class="container margin_60">

    	<div class="row">
        <aside class="col-lg-3 col-md-3">


		<div id="filters_col">

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
        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
        <div class="collapse" id="collapseFilters">

                    <div class="filter_type">
                    <h6>Star Category</h6>
                    <ul style="margin-left:15px;">

<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND rating=5 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="search.php?search=<?=$search?>&rating=5"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
                        </span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE ( name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND rating=4 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&rating=4"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
                        </span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE ( name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi ) AND rating=3 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&rating=3"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                        </span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND rating=2 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&rating=2"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                        </span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND rating=1 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&rating=1"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                        </span>(<?=$num?>)</a></label></li>
                    </ul>
                </div>
                <div class="filter_type">
                    <h6>Review Score</h6>
                    <ul style="margin-left:15px;">
<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND view BETWEEN 1000 AND 1000000 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&review=Superb">Superb: 9+ (<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND view BETWEEN 750 AND 999 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&review=Very_good">Very good: 8+ (<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND view BETWEEN 500 AND 749 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&review=Good">Good: 7+ (<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND view BETWEEN 250 AND 499 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&review=Pleasant">Pleasant: 6+ (<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND view BETWEEN 0 AND 249 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="search.php?search=<?=$search?>&review=No_rating">No rating (<?=$num?>)</a></label></li>
                    </ul>
                </div>



<div class="filter_type">
                    <h6>Sort by price</h6>
                    <ul >

<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND endprice BETWEEN 0 AND 100 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="search.php?search=<?=$search?>&result=1&page=1"><i class="icon-right-open-outline"></i>From ฿0 - ฿100 (<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND endprice BETWEEN 100 AND 200 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="search.php?search=<?=$search?>&result=2&page=1"><i class="icon-right-open-outline"></i>From ฿100 - ฿200(<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND endprice BETWEEN 200 AND 500 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="search.php?search=<?=$search?>&result=3&page=1"><i class="icon-right-open-outline"></i>From ฿200 - ฿500 (<?=$num?>)</a></label></li>


<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND endprice BETWEEN 500 AND 1000 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="search.php?search=<?=$search?>&result=4&page=1"><i class="icon-right-open-outline"></i>From ฿500 - ฿1000 (<?=$num?>)</a></label></li>


<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND endprice BETWEEN 1000 AND 2500 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

            <li><label> <a href="search.php?search=<?=$search?>&result=5&page=1"><i class="icon-right-open-outline"></i>From ฿1000 - ฿2500 (<?=$num?>)</a></label></li>


<?php
$sql="SELECT COUNT(*) FROM product WHERE (name LIKE '%$search%' OR keyword2 LIKE '%$search%' $search_multi) AND endprice BETWEEN 2500 AND 10000000 ORDER BY rating DESC";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>

            <li><label> <a href="search.php?search=<?=$search?>&result=6&page=1"><i class="icon-right-open-outline"></i>From more ฿2500 (<?=$num?>)</a></label></li>



                    </ul>
                </div>




            </div><!--End collapse -->
		</div><!--End filters col-->

		</aside><!--End aside -->

        <div class="col-lg-9 col-md-9">

           <div id="tools">


           <p style="margin: 8px;">แสดงข้อมูลการค้นหา (<?=$numSearch?>) </p>
            </div><!--/tools -->





<div class="post-items" id="post-items">



<?php
for($i=0;$row=mysqli_fetch_assoc($result);$i++){
?>


    			<div class="strip_all_tour_list wow fadeIn post-item" data-wow-delay="0.1s">
                   <div class="row">
                	<div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="wishlist">


<form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

            <input class="pro_id form hide" type="text" name="id" value="<?=$row['id']?>" />
            	<a class="tooltip_flip tooltip-effect-1" type="submit" onclick="$(this).closest('form').submit()">
                    +<span class="tooltip-content-flip">
                    <span class="tooltip-back">Add to wishlist</span></span></a>
</form>



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
<?php
$total1 = 0;
$sqlcom="SELECT * FROM webboard_reply WHERE post_id=$row[id]";
$resultcom=mysqli_query($con,$sqlcom)or die(mysql_error());
$numcom=mysqli_num_rows($resultcom);
for($i=0;$rowcom=mysqli_fetch_assoc($resultcom);$i++){


    $total1 += $rowcom['rating'];

}

$total1

?>

              </div>
                    	<div class="img_list"><a href="shop-<?=$row['id']?>">
                        <img src="admin/cusimage/<?=$row['image']?>" alt="<?=$row['name']?>">
                        <div class="short_info"></div>
                        </a>
                        </div>
                    </div>
                     <div class="clearfix visible-xs-block"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    		<div class="tour_list_desc">
                            <div id="score"><?=$scoreview?><span> <?=(number_format((float)($total1/$numcom), 1, '.', ''))?> </span></div>
                            <div class="rating">
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
                            </div>
                            <h3><strong><?=$row['name']?></strong></h3>
                            <p><?=mb_substr(strip_tags($row['detail']),0,150,'UTF-8')?>...</p>
                            <ul class="add_info">

                            <?php
                            if($row['phone']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['phone']?>"><i class="fa icon-phone"></i></a>
                            </li>
                            <?php
                            }
                            ?>


                            <?php
                            if($row['facebook']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['facebook']?>"><i class="fa icon-facebook"></i></a>
                            </li>
                            <?php
                            }
                            ?>


                            <?php
                            if($row['instagramm']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['instagram']?>"><i class="fa icon-instagramm"></i></a>
                            </li>
                            <?php
                            }
                            ?>


                            <?php
                            if($row['line']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="ID Line : <?=$row['line']?>"><i class="fa icon-comment-empty"></i></a>
                            </li>
                            <?php
                            }
                            ?>


                            <?php
                            if($row['email']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['email']?>"><i class="fa icon-mail-2"></i></a>
                            </li>
                            <?php
                            }
                            ?>


                            <?php
                            if($row['youtube']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['youtube']?>"><i class="fa icon-youtube-squared"></i></a>
                            </li>
                            <?php
                            }
                            ?>



                            <?php
                            if($row['website']!="ไม่ระบุ"){
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['website']?>"><i class="fa icon-desktop"></i></a>
                            </li>
                            <?php
                            }
                            ?>







                            </ul>
                            </div>
                    </div>
					<div class="col-lg-2 col-md-2 col-sm-2">
                    	<div class="price_list"><div><?=number_format($row['view'])?><span class="normal_price_list"></span><small >*ยอดเข้าชม</small>
                        <p><a href="shop-<?=$row['id']?>" class="btn_1">Details</a></p>
                        </div>
                        </div>
                    </div>
                    </div>
				</div><!--End strip -->


<?php
}
?>



</div>
                <hr>


<?php
if($rating == 0 && $review == "" && $buy1==110){
?>


                <div class="text-center" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class=""><a href="search.php?search=<?=$search?>&page=<?=$page?>">Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="search.php?ssearch=<?=$search?>&page=<?=$i+1?>"><?=$i+1?></a></li>
 <?php
}
  else{
?>


                        <li class=""><a href="search.php?search=<?=$search?>&page=<?=$i+1?>"><?=$i+1?></a></li>
<?php
  }
}
if($page<$num_page-1){
?>

                        <li class="next"><a href="search.php?search=<?=$search?>&page=<?=$page+2?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->
<?php
}

if($rating == 0 && $review == "" && $buy1!=110){
?>


                <div class="text-center hidden" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class=""><a href="search.php?search=<?=$search?>&page=<?=$page?>&result=<?=$buy1?>">Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="search.php?search=<?=$search?>&result=<?=$buy1?>&page=<?=$i+1?>"><?=$i+1?></a></li>
 <?php
}
  else{
?>


                        <li class="disabled"><a><?=$i+1?></a></li>
<?php
  }
}
if($page<$num_page-1){
?>

                        <li class="next"><a href="search.php?search=<?=$search?>&result=<?=$buy1?>&page=<?=$page+2?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->


<?php
}

if($rating != 0 && $review == "" && $buy1==110){
?>

<div class="text-center" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class=""><a href="search.php?search=<?=$search?>&page=<?=$page?>&rating=<?=$rating?>">Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="search.php?search=<?=$search?>&page=<?=$i+1?>&rating=<?=$rating?>"><?=$i+1?></a></li>
 <?php
}
  else{
?>


                        <li class=""><a href="search.php?search=<?=$search?>&page=<?=$i+1?>&rating=<?=$rating?>"><?=$i+1?></a></li>
<?php
  }
}
if($page<$num_page-1){
?>

                        <li class="next"><a href="search.php?search=<?=$search?>&page=<?=$page+2?>&rating=<?=$rating?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->


<?php
}
if($rating == 0 && $review != "" && $buy1==110){
?>


                <div class="text-center" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class=""><a href="search.php?search=<?=$search?>&page=<?=$page?>&review=<?=$review?>">Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="search.php?search=<?=$search?>&review=<?=$review?>&page=<?=$i+1?>"><?=$i+1?></a></li>
 <?php
}
  else{
?>


                        <li class=""><a href="search.php?search=<?=$search?>&review=<?=$review?>&page=<?=$i+1?>"><?=$i+1?></a></li>
<?php
  }
}
if($page<$num_page-1){
?>

                        <li class="next"><a href="search.php?search=<?=$search?>&review=<?=$review?>&page=<?=$page+2?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->


<?php
}
?>

<div class="center-slick">
                    <?php

                        function readMore($str,$r_id){
                            if(strlen($str) > 200){
                                echo substr($str, 0,200)."... "."<a href=\"inreview.php?rev_id=$r_id\">อ่านต่อ</a>";
                            }else{
                                echo $str;
                            }
                        }

                        $sql_review="SELECT review.ID as review_id,review.user_id as user_id , review.img_review as img_review , review.create_date as create_date ,review.caption as caption,review.shop_name as shop_name,user.picture as user_picture,user.username as user_username From reviews as review INNER JOIN users as user ON review.user_id = user.id WHERE review.caption like '%$search%' OR review.shop_name like '%$search%' ORDER BY review.create_date desc";
                        $result_review=mysqli_query($con,$sql_review)or die(mysql_error());

                        for($i=0;$row=mysqli_fetch_assoc($result_review);$i++){
                        ?>
                            <div class="block all_block" >
                              <div class="image" style="background-color: #eaeaea;">
                                <a href="inreview.php?rev_id=<?=$row["review_id"]?>" class="img" rel="">
                                    <img src="admin/rev_img/<?=$row["img_review"]?>" class="" style="display: inline; width:368px;">
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
                </div>











        </div><!-- End col lg-9 -->
    </div><!-- End row -->
</div><!-- End container -->

<?php
include("footer.php");
?>

<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

<!-- Specific scripts -->
<!-- Check and radio inputs -->
<script src="js/icheck.js"></script>

<!-- Slick.js -->
<script src="slick-1.5.9/slick/slick.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.center-slick').slick({
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2,
            arrows:true,
            responsive: [
              {
                breakpoint: 640,
                settings: {
                  arrows: true,
                  centerMode: true,
                  centerPadding: '30px',
                  slidesToShow: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: true,
                  centerMode: true,
                  centerPadding: '30px',
                  slidesToShow: 1
                }
              }
            ]
          });
      });
</script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <!-- Map -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="js/infobox.js"></script>


<script type="text/javascript" src="lib/jquery.infinitescroll.min.js"></script>
<script>

$(function(){
    var $container = $('#post-items');

//    $container.infinitescroll({
//      navSelector  : '.next',    // selector for the paged navigation
//      nextSelector : '.next a',  // selector for the NEXT link (to page 2)
//      itemSelector : '.post-item',     // selector for all items you'll retrieve
//      debug        : false,
//      dataType     : 'html',
//      loading: {
//          finishedMsg: '',
//          img: 'img/spinner.gif'
//        }
//      }
//    );
  });


</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=935699479860195";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;
    properties = "width="+windowWidth+",height="+windowHeight;
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
    window.open(url,name,properties);
}

function shareFacebook(rev_id){
                        FB.ui({
                            display: 'popup',
                            method: 'share',
                            href: 'https://www.teeneejj.com/inreview.php?rev_id='+rev_id ,
                          }, function(response){});
                    }
</script>
<script src="admin/assets/vendor/pnotify/pnotify.custom.js"></script>
<script type="text/javascript">
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
    $('form#cutproduct').on('submit',function(e){




          e.preventDefault();

              var $form = $(this).closest("form#cutproduct");
              var formData =  $form.serializeArray();
              var username =  $form.find(".pro_id").val();



          if(username){
            $.ajax({
              type: "POST",
              async: true,
              url: "wishlist.php",
              data: "id="+username,
              dataType: "jsonp",
           success: function(json){
               if(json.status == 1001) {

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
            type: 'error',
            addclass: 'stack-bottomright',
            stack: stack_bottomright
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
               var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};
        new PNotify({
            title: 'เสร็จสมบูรณ์',
            text: 'ได้ทำการลบรายการที่ชื่นชอบเรียบร้อยแล้ว',
            type: 'info',
            addclass: 'stack-bottomright',
            stack: stack_bottomright
        });

setTimeout(function(){
   window.location.reload(1);
}, 1800);



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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72009222-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
