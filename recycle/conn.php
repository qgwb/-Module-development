<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/27 0027
 * Time: 下午 5:11
 */
$servername = "106.14.177.245";
$username = "root";
$password = "31501370";
$database = "lanou";

$db=mysqli_connect($servername,$username,$password,$database);
if(mysqli_connect_errno()){
    echo "ERROR connect";
    exit;
}
//else{
//    echo "Connect Success!";
//}
$typeid = $_GET['typeid'];
//$typeid = 2001;
$result = mysqli_query($db,"select * from typedetail where Type_id = ".$typeid);
$rownum=mysqli_num_rows($result);
echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title></title>
		<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/lib/weui.min.css">
		<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
		</head>
	    <body ontouchstart>
	    <div id="maingrids">
    			<div class="weui-grids">';

for($i=0;$i<$rownum;$i++) {
    $row = mysqli_fetch_assoc($result);
    echo '<a href="typedetail.php?typedetailid=' . $row['Typedetail_id'] . '" class="weui-grid js_grid">
        			<div class="weui-grid__icon">
          				<img src="img/' . $row['Typedetail_id'] . '.png" alt="">
        			</div>
        			<p class="weui-grid__label">' . $row['Typedetail_name'] . '</p>
      				</a>';
}
echo '</div>
    		</div>
		<script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
		<script src="jquery-weui-build/dist/js/jquery-weui.min.js"></script>
		<script src="jquery-weui-build/dist/js/swiper.min.js"></script>
		<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
		<script>
  			$(function() {
    			FastClick.attach(document.body);
  			});

		</script>';
?>
