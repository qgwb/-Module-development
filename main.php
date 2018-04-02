<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28 0028
 * Time: 下午 8:36
 */
$servername = "106.14.177.245";
$username = "root";
$password = "31501370";
$database = "lanou";

$db=mysqli_connect($servername,$username,$password,$database);
$result = mysqli_query($db,"select * from type");
$rownum=mysqli_num_rows($result);
echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title></title>
		<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/lib/weui.min.css">
		<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
		<style type="text/css">
      	.swiper-container {
      		position: fixed;
      		top: 0;
        	width: 100%;
     	 }

      	.swiper-container img {
        	display: block;
        	width: 100%;
        	height: 150px;
      	}
      	/*#mainswiper{
      		position: fixed;
      		top: 0;
      	}*/
      	#maingrids{
      		position: fixed;
      		width: 100%;
      		top:150px;
      		bottom: 53px;
      		overflow: auto;
      	}
      	/*#maintab{
      		position:absolute;bottom:0;width: 100%;
      	}*/
    	</style>
	</head>
	<body ontouchstart>
			<div id="mainswiper">
				<div class="swiper-container" data-space-between=\'10\' data-pagination=\'.swiper-pagination\' data-autoplay="1000">
  					<div class="swiper-wrapper">
    					<div class="swiper-slide"><img src="img/swiper1.jpg" alt=""></div>
    					<div class="swiper-slide"><img src="img/swiper2.png" alt=""></div>
    					<div class="swiper-slide"><img src="img/swiper3.png" alt=""></div>
  					</div>
  					<div class="swiper-pagination"></div>
				</div>
			</div>
			<div id="maingrids">
    			<div class="weui-grids">';
for($i=0;$i<$rownum;$i++) {
    $row = mysqli_fetch_assoc($result);
    echo '<a href="conn.php?typeid=' . $row['Type_ID'] . '" class="weui-grid js_grid">
        			<div class="weui-grid__icon">
          				<img src="img/' . $row['Type_ID'] . '.png" alt="">
        			</div>
        			<p class="weui-grid__label">' . $row['Type_name'] . '</p>
      				</a>';
}
echo '</div>
    		</div>
		<script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
		<script src="jquery-weui-build/dist/js/jquery-weui.min.js"></script>
		<script src="jquery-weui-build/dist/js/swiper.min.js"></script>
		<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
		<script>
			$(".swiper-container").swiper({
        	loop: true,
        	autoplay: 3000
      });
			$(\'.js_grid\').click(function(){
				console.log($(this).attr("id"));
			})
		</script>';
?>