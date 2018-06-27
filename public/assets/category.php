<?php
session_start();
include('admin/server/connect.php');
include("fb_connect_popup.php");


$sqlset="SELECT * FROM setting";
$resultset=mysqli_query($con,$sqlset)or die(mysql_error());
$rowset=mysqli_fetch_assoc($resultset);


$num_col=1;
$num_row=3;
//เรคคอร์ดที่สิ้นสุด
$page_size=$num_col*$num_row;
//กำหนดค่าเริ่มต้น
if($_REQUEST['category_id']==""){echo"<script>history.back();</script>";exit;}
$category_id=$_REQUEST['category_id'];
$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
$page=$page-1;
//หาจำนวนหน้า



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

$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result);
$num=$row['COUNT(*)'];
//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE category_id=$category_id ORDER BY id DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$num=mysqli_num_rows($result);




$sqlq="SELECT * FROM product WHERE category_id=$category_id  ORDER BY rating DESC ";
$resultq=mysqli_query($con,$sqlq)or die(mysql_error());

//หมวดสินค้า
$sqlShowCategory="SELECT * FROM category WHERE id=$category_id";
$resultShowCategory=mysqli_query($con,$sqlShowCategory)or die(mysql_error());
$rowShowCategory=mysqli_fetch_assoc($resultShowCategory);
$numShowCategory=mysqli_num_rows($resultShowCategory);

}







if($rating == 0 && $review == "" && $buy1!=110){

$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result);
$num=$row['COUNT(*)'];
//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE category_id=$category_id AND member = 0 OR member = 1 AND endprice BETWEEN $buy[0] AND $buy[1] ORDER BY id DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$num=mysqli_num_rows($result);




$sqlq="SELECT * FROM product WHERE category_id=$category_id AND member = 1  ORDER BY rating DESC LIMIT 0";
$resultq=mysqli_query($con,$sqlq)or die(mysql_error());

//หมวดสินค้า
$sqlShowCategory="SELECT * FROM category WHERE id=$category_id";
$resultShowCategory=mysqli_query($con,$sqlShowCategory)or die(mysql_error());
$rowShowCategory=mysqli_fetch_assoc($resultShowCategory);
$numShowCategory=mysqli_num_rows($resultShowCategory);

}







 if($rating != 0 && $review == "" && $buy1==110){

$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND rating=$rating ";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result);
$num=$row['COUNT(*)'];
//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE category_id=$category_id AND rating=$rating ORDER BY rating DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$num=mysqli_num_rows($result);


$sqlq="SELECT * FROM product WHERE category_id=$category_id AND member = 1  ORDER BY rating DESC LIMIT 0";
$resultq=mysqli_query($con,$sqlq)or die(mysql_error());

//หมวดสินค้า
$sqlShowCategory="SELECT * FROM category WHERE id=$category_id";
$resultShowCategory=mysqli_query($con,$sqlShowCategory)or die(mysql_error());
$rowShowCategory=mysqli_fetch_assoc($resultShowCategory);
$numShowCategory=mysqli_num_rows($resultShowCategory);

}


 if($rating == 0 && $review != "" && $buy1==110){

$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND view BETWEEN $review1[0] AND $review1[1] ";
$result=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result);
$num=$row['COUNT(*)'];
//หมายเลขหน้า
$num_page=ceil($num/$page_size);
//เรคคอร์ดที่เริ่ม
$start_record=$page*$page_size;
//เลือกข้อมูล
$sql="SELECT * FROM product WHERE category_id=$category_id  AND view BETWEEN $review1[0] AND $review1[1]  ORDER BY rating DESC LIMIT $start_record, $page_size";
$result=mysqli_query($con,$sql)or die(mysql_error());
$num=mysqli_num_rows($result);

$sqlq="SELECT * FROM product WHERE category_id=$category_id AND member = 1  ORDER BY rating DESC LIMIT 0";
$resultq=mysqli_query($con,$sqlq)or die(mysql_error());

//หมวดสินค้า
$sqlShowCategory="SELECT * FROM category WHERE id=$category_id";
$resultShowCategory=mysqli_query($con,$sqlShowCategory)or die(mysql_error());
$rowShowCategory=mysqli_fetch_assoc($resultShowCategory);
$numShowCategory=mysqli_num_rows($resultShowCategory);

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
    <META https-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META https-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <meta name="description" content="TeeneeJJ (ที่นี่เจเจ) เป็นเว็บไซต์และแอปพลิเคชันในไทย ในเรื่องร้านขายสินค้า">
    <meta name="author" content="TeeneeJJ">
    <title>TEENEEJJ - ตลาดนัดสวนจตุจักร</title>

    <!-- Favicons-->
    <link rel="shortcut icon" type="image/png" href="img/apple-touch-icon-57x57-precomposed.png?m=<?=time()?>"/>

    <!-- CSS -->
    <link href="css/base.css" rel="stylesheet">


    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">
        <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/vendor/pnotify/pnotify.custom.css">
    <link href="css/menuresponsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/map/style.css">
    <link rel="stylesheet" type="text/css" href="css/frontend/image_mapper.css">

    <!-- Google web fonts -->
   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
   <link href="css/menuresponsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->


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
                        <a href="https://www.teeneejj.com/"><img src="img/logo.png" height="54" alt="<?=$rowShowCategory['name']?>" data-retina="true" class="logo_normal"></a>
                        <a href="https://www.teeneejj.com/"><img src="img/logo_sticky.png" height="54" alt="<?=$rowShowCategory['name']?>" data-retina="true" class="logo_sticky"></a>
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


<section class="parallax-window" style="    min-height: 390px; height: 390px;" data-parallax="scroll" data-image-src="admin/cusimage/<?=$rowShowCategory['image']?>" data-natural-width="1400" data-natural-height="370">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1><?=$rowShowCategory['name']?></h1>
        <p><?=$rowShowCategory['detail']?></p>
        </div>
    </div>
</section><!-- End section -->

<div id="position">
    	<div class="container">
                	<ul>
                    <li><a href="https://www.teeneejj.com">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li><?=$rowShowCategory['name']?></li>
                    </ul>
        </div>
    </div><!-- Position -->

<style type="text/css">
.imagemapper-wrapper{
  width: 1200px !important;
    visibility: visible;
  cursor: pointer;
  -webkit-transform: matrix(1, 0, 0, 1, 0, -137);
}
.imapper-pin-icon {
    left: -21px !important;
    font-size: 30px;
    top: -64px !important;
}
</style>

     <div class="collapse" id="collapseMap">
        <div id="map" class="map" style="overflow: hidden;     height: 325px;" >
            <div id="panzoom" style="" >


            <div id="imagemapper4-wrapper" class="imagemapper-wrapper" style="width: 1200px; visibility: visible;">

        <img id="imapper4-map-image" src="admin/cusimage/<?=$rowset['map_image']?>" />


<?php
$sqlmap="SELECT * FROM product WHERE category_id=$category_id";
$resultmap=mysqli_query($con,$sqlmap)or die(mysql_error());
for($i=0;$rowmap=mysqli_fetch_assoc($resultmap);$i++){
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




    </div>




            </div>
        </div>
    </div><!-- End Map -->

<div  class="container margin_60">

    	<div class="row">
        <aside class="col-lg-3 col-md-3">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
            </p>

		<div id="filters_col">
			<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
			<div class="collapse" id="collapseFilters">

                	<div class="filter_type">
					<h6>Star Category</h6>
					<ul style="margin-left:15px;">

<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND rating=5 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

						<li><label> <a href="category-<?=$category_id?>-1-5"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
						</span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND rating=4 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
						<li><label><a href="category-<?=$category_id?>-1-4"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
						</span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND rating=3 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
						<li><label><a href="category-<?=$category_id?>-1-3"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
						</span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND rating=2 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
						<li><label><a href="category-<?=$category_id?>-1-2"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
						</span>(<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND rating=1 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
						<li><label><a href="category-<?=$category_id?>-1-1"><span class="rating">
						<i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
						</span>(<?=$num?>)</a></label></li>
					</ul>
				</div>
				<div class="filter_type">
					<h6>Review Score</h6>
					<ul style="margin-left:15px;">
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND view BETWEEN 1000 AND 1000000 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
						<li><label><a href="category.php?category_id=<?=$category_id?>&review=Superb">Superb: 9+ (<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND view BETWEEN 750 AND 999 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_array($result4);
$num=$row['COUNT(*)'];
?>
						<li><label><a href="category.php?category_id=<?=$category_id?>&review=Very_good">Very good: 8+ (<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND view BETWEEN 500 AND 749 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="category.php?category_id=<?=$category_id?>&review=Good">Good: 7+ (<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND view BETWEEN 250 AND 499 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="category.php?category_id=<?=$category_id?>&review=Pleasant">Pleasant: 6+ (<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND view BETWEEN 0 AND 249 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>
                        <li><label><a href="category.php?category_id=<?=$category_id?>&review=No_rating">No rating (<?=$num?>)</a></label></li>
					</ul>
				</div>


<div class="filter_type">
                    <h6>Sort by price</h6>





<ul >

<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND endprice BETWEEN 0 AND 100 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="category.php?category_id=<?=$category_id?>&result=1&page=1"><i class="icon-right-open-outline"></i>From ฿0 - ฿100 (<?=$num?>)</a></label></li>
<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND endprice BETWEEN 100 AND 200 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="category.php?category_id=<?=$category_id?>&result=2&page=1"><i class="icon-right-open-outline"></i>From ฿100 - ฿200(<?=$num?>)</a></label></li>

<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND endprice BETWEEN 200 AND 500 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="category.php?category_id=<?=$category_id?>&result=3&page=1"><i class="icon-right-open-outline"></i>From ฿200 - ฿500 (<?=$num?>)</a></label></li>


<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id  AND endprice BETWEEN 500 AND 1000 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

                        <li><label> <a href="category.php?category_id=<?=$category_id?>&result=4&page=1"><i class="icon-right-open-outline"></i>From ฿500 - ฿1000 (<?=$num?>)</a></label></li>


<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id  AND endprice BETWEEN 1000 AND 2500 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

            <li><label> <a href="category.php?category_id=<?=$category_id?>&result=5&page=1"><i class="icon-right-open-outline"></i>From ฿1000 - ฿2500 (<?=$num?>)</a></label></li>


<?php
$sql="SELECT COUNT(*) FROM product WHERE category_id=$category_id AND endprice BETWEEN 2500 AND 10000000 ";
$result4=mysqli_query($con,$sql)or die(mysql_error());
$row=mysqli_fetch_assoc($result4);
$num=$row['COUNT(*)'];
?>

            <li><label> <a href="category.php?category_id=<?=$category_id?>&result=6&page=1"><i class="icon-right-open-outline"></i>From more ฿2500 (<?=$num?>)</a></label></li>



                    </ul>









                </div>


			</div><!--End collapse -->
		</div><!--End filters col-->
		<div class="box_style_2">
			<i class="icon_set_1_icon-57"></i>
			<h4>Need <span>Help?</span></h4>
			<a href="tel://004542344599" class="phone"><?=$rowset['tel']?></a>
			<small>Monday to Friday 9.00am - 7.30pm</small>
		</div>
		</aside><!--End aside -->

        <div class="col-lg-9 col-md-9">

           <div id="tools">
           <div class="row">
           	<div class="col-md-3 col-sm-3 col-xs-6">

                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">

             </div>

            <div class="col-md-6 col-sm-6 hidden-xs text-right">
            	<a href="category_grid-<?=$category_id?>" class="bt_filters"><i class="icon-th"></i></a>
                <a href="category-<?=$category_id?>" class="bt_filters"><i class=" icon-list"></i></a>
            </div>
        	</div>
            </div><!--/tools -->













<?php
for($i=0;$row=mysqli_fetch_assoc($resultq);$i++){

?>




                <div class="strip_all_tour_list wow fadeIn " data-wow-delay="0.1s">
                   <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="wishlist">
                <form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

            <input class="user_id form hide" type="text" name="id" value="<?=$row['id']?>" />
                <a class="tooltip_flip tooltip-effect-1" >
                    +<span class="tooltip-content-flip">
                    <span class="tooltip-back">Add to wishlist</span></span></a>
</form>
</div>
                        <div class="img_list"><a href="shop-<?=$row['id']?>">
                        <img src="admin/cusimage/<?=$row['image']?>" alt="<?=$row['name']?>">
                        <!--<div class="ribbon top_rated"></div>-->
                        <div class="short_info"></div>
                        </a>
                        </div>
                    </div>
                     <div class="clearfix visible-xs-block"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tour_list_desc">


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

                            <div id="score"><?=$scoreview?><span><?=(number_format((float)($total1/$numcom), 1, '.', ''))?></span></div>

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
                            if($row['instagram']!="ไม่ระบุ"){
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

















<div class="post-items" id="post-items">


<?php
//for($i=0;$row=mysqli_fetch_assoc($result);$i++){
//
//?>




<!--    			<div class="strip_all_tour_list wow fadeIn post-item" data-wow-delay="0.1s">
                   <div class="row">
                	<div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="wishlist">
            	<form id="cutproduct" class="typePay2 " novalidate="novalidate" action="" method="post"  role="form">

            <input class="user_id form hide" type="text" name="id" value="<?=$row['id']?>" />
                <a class="tooltip_flip tooltip-effect-1" >
                    +<span class="tooltip-content-flip">
                    <span class="tooltip-back">Add to wishlist</span></span></a>
</form>
</div>
                    	<div class="img_list"><a href="shop-<?=$row['id']?>">
                        <img src="admin/cusimage/<?=$row['image']?>" alt="<?=$row['name']?>">
                        <div class="short_info"></div>
                        </a>
                        </div>
                    </div>
                     <div class="clearfix visible-xs-block"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    		<div class="tour_list_desc">-->


<?php
//    $scoreview = "";
//
//  if($row['view'] < 50){
//    $scoreview = "No rating";
//  } else if($row['view'] < 100 && $row['view'] > 50){
//    $scoreview = "Pleasant";
//  } else if($row['view'] < 350 && $row['view'] > 100){
//    $scoreview = "Good";
//  } else if($row['view'] < 550 && $row['view'] > 350){
//    $scoreview = "Very good";
//  } else {
//    $scoreview = "Superb";
//  }
//?>
<?php
//$total1 = 0;
//$sqlcom="SELECT * FROM webboard_reply WHERE post_id=$row[id]";
//$resultcom=mysqli_query($sqlcom)or die(mysql_error());
//$numcom=mysqli_num_rows($resultcom);
//for($i=0;$rowcom=mysqli_fetch_assoc($resultcom);$i++){
//
//
//    $total1 += $rowcom['rating'];
//
//}
//
//$total1
//
//?>

                            <!--<div id="score"><?=$scoreview?><span><?=(number_format((float)($total1/$numcom), 1, '.', ''))?></span></div>-->

                    <!--<div class="rating">-->
                        <?php
//for($i=1;$i <= $row['rating'];$i++){
//?>

                            <!--<i class="icon-star voted"></i>-->
    <?php
//    }
//    ?>

<?php
//$total = 5;
//$total -= $row['rating'];
//
//for($i=1;$i <= $total;$i++){
//?>

                           <!--<i class="icon-star-empty"></i>-->
    <?php
//    }
//    ?>
<!--                    </div>


                            <h3><strong><?=$row['name']?></strong></h3>
                            <p><?=mb_substr(strip_tags($row['detail']),0,150,'UTF-8')?>...</p>
                            <ul class="add_info">-->

                            <?php
//                            if($row['phone']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['phone']?>"><i class="fa icon-phone"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>


                            <?php
//                            if($row['facebook']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['facebook']?>"><i class="fa icon-facebook"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>


                            <?php
//                            if($row['instagramm']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['instagram']?>"><i class="fa icon-instagramm"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>


                            <?php
//                            if($row['line']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="ID Line : <?=$row['line']?>"><i class="fa icon-comment-empty"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>


                            <?php
//                            if($row['email']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['email']?>"><i class="fa icon-mail-2"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>


                            <?php
//                            if($row['youtube']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['youtube']?>"><i class="fa icon-youtube-squared"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>



                            <?php
//                            if($row['website']!="ไม่ระบุ"){
//                            ?>
<!--                            <li>
                                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?=$row['website']?>"><i class="fa icon-desktop"></i></a>
                            </li>  -->
                            <?php
//                            }
//                            ?>







<!--                            </ul>
                            </div>
                    </div>
					<div class="col-lg-2 col-md-2 col-sm-2">
                    	<div class="price_list"><div><?=number_format($row['view'])?><span class="normal_price_list"></span><small >*ยอดเข้าชม</small>
                        <p><a href="shop-<?=$row['id']?>" class="btn_1">Details</a></p>
                        </div>
                        </div>
                    </div>
                    </div>
				</div>End strip -->

<?php
//}
//?>


</div>
                <hr>









<?php
if($rating == 0 && $review == "" && $buy1==110){
?>


                <div class="text-center hidden" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class="disabled"><a>Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="category-<?=$category_id?>-<?=$i+1?>"><?=$i+1?></a></li>
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

                        <li class="next"><a href="category-<?=$category_id?>-<?=$page+2?>">Next</a></li>
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
                        <li class="disabled"><a>Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="category.php?category_id=<?=$category_id?>&result=<?=$buy1?>&page=<?=$i+1?>"><?=$i+1?></a></li>
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

                        <li class="next"><a href="category.php?category_id=<?=$category_id?>&result=<?=$buy1?>&page=<?=$page+2?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->


<?php
}

if($rating != 0 && $review == "" && $buy1==110){
?>

<div class="text-center hidden" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class="disabled"><a>Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="category-<?=$category_id?>-<?=$i+1?>-<?=$rating?>"><?=$i+1?></a></li>
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

                        <li class="next"><a href="category-<?=$category_id?>-<?=$page+2?>-<?=$rating?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->


<?php
}
if($rating == 0 && $review != "" && $buy1==110){
?>


                <div class="text-center hidden" >
                    <ul class="pagination">
<?php
    if($page>0){
?>
                        <li class="disabled"><a>Prev</a></li>
<?php
  }
  for($i=0;$i<$num_page;$i++){
    if($i==$page){
  ?>
                        <li class="active"><a href="category.php?category_id=<?=$category_id?>&review=<?=$review?>&page=<?=$i+1?>"><?=$i+1?></a></li>
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

                        <li class="next"><a href="category.php?category_id=<?=$category_id?>&review=<?=$review?>&page=<?=$page+2?>">Next</a></li>
 <?php
}
?>

                    </ul>
                </div><!-- end pagination-->


<?php
}
?>



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
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <!-- Map -->



        <script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){
    myleft=(screen.width)?(screen.width-windowWidth)/2:100;
    mytop=(screen.height)?(screen.height-windowHeight)/2:100;
    properties = "width="+windowWidth+",height="+windowHeight;
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
    window.open(url,name,properties);
}

</script>
<script type="text/javascript" src="lib/jquery.infinitescroll.min.js"></script>
<script>

$(function(){
    var $container = $('#post-items');

    $container.infinitescroll({
      navSelector  : '.next',    // selector for the paged navigation
      nextSelector : '.next a',  // selector for the NEXT link (to page 2)
      itemSelector : '.post-item',     // selector for all items you'll retrieve
      debug        : false,
      dataType     : 'html',
      loading: {
          finishedMsg: '',
          img: 'img/spinner.gif'
        }
      }
    );
  });


</script>
<script src="admin/assets/vendor/pnotify/pnotify.custom.js"></script>
<script type="text/javascript">

$(document).delegate('a.tooltip_flip', 'click', function(){
        //  var username = $('form#cutproduct input[name=id]').val();
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};

        var $form = $(this).closest("form#cutproduct");
        var formData =  $form.serializeArray();
        var userId =  $form.find(".user_id").val();

          if(userId){
            $.ajax({
              type: "POST",
              async: true,
              url: "wishlist.php",
              data: "id="+userId,
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

        new PNotify({
            title: 'เสร็จสมบูรณ์',
            text: 'ได้ทำการลบรายการที่ชื่นชอบเรียบร้อยแล้ว.',
            type: 'success',
            addclass: 'icon-nb'
        });
$(window).scrollTop(0);

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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=935699479860195";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


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



 <script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <script type="text/javascript" src="js/frontend/jquery.image_mapper.js"></script>
    <script type="text/javascript" src="js/frontend/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="js/frontend/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="js/frontend/jquery.prettyPhotos.js"></script>
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
