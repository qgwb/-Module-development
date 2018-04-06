<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/6 0006
 * Time: 下午 2:32
 */
require_once('weixin.class.php');
$weixin = new class_weixin();

if (!isset($_GET["code"])){
    $redirect_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $jumpurl = $weixin->oauth2_authorize($redirect_url, "snsapi_userinfo", "123");
    Header("Location: $jumpurl");
}else{
    $access_token_oauth2 = $weixin->oauth2_access_token($_GET["code"]);
    $userinfo = $weixin->oauth2_get_user_info($access_token_oauth2['access_token'], $access_token_oauth2['openid']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员订单界面</title>
    <link rel="stylesheet" type="text/css" href="weui-master/dist/style/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <style type="text/css">
        body{
            background-color:  #F8F8F8;
        }
    </style>
</head>
<body>
<div class="weui-tab">
    <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on" href="#tab1">
            已完成订单
        </a>
        <a class="weui-navbar__item" href="#tab2">
            未完成订单
        </a>
    </div>
    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active"></div>
        <div id="tab2" class="weui-tab__bd-item"></div>
    </div>
</div>
<script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
<script src="jquery-weui-build/dist/js/jquery-weui.min.js"></script>
<script src="jquery-weui-build/dist/js/swiper.min.js"></script>
<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
<script>
    localStorage.setItem("openid","<?php echo $userinfo['openid'];?>");
    $("#tab1").load("finish.php");
    $("#tab2").load("unfinish.php");
</script>
</body>
</html>
