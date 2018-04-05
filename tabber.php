<?php
///**
// * Created by PhpStorm.
// * User: Administrator
// * Date: 2018/4/1 0001
// * Time: 下午 2:32
// */
//require_once('weixin.class.php');
//$weixin = new class_weixin();
//
//if (!isset($_GET["code"])){
//    $redirect_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//    $jumpurl = $weixin->oauth2_authorize($redirect_url, "snsapi_userinfo", "123");
//    Header("Location: $jumpurl");
//}else{
//    $access_token_oauth2 = $weixin->oauth2_access_token($_GET["code"]);
//    $userinfo = $weixin->oauth2_get_user_info($access_token_oauth2['access_token'], $access_token_oauth2['openid']);
//}
//?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title></title>
    <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/lib/weui.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
    <script>
        window.addEventListener('pageshow', function(e) {
            // 通过persisted属性判断是否存在 BF Cache
            if (e.persisted) {
                location.reload();
            }
        });
    </script>
</head>
<body>
<div class="weui-tab">
    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active"></div>
        <div id="tab2" class="weui-tab__bd-item"></div>
    </div>
    <div id="tabbar">
        <div class="weui-tabbar" style="position: fixed; bottom: 0;">
            <a href="#tab1" class="weui-tabbar__item weui-bar__item--on">
                <!--<span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span>-->
                <div class="weui-tabbar__icon">
                    <img src="img/shouye.png" alt="">
                </div>
                <p class="weui-tabbar__label">首页</p>
            </a>
            <a href="#tab2" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="img/feipinkuang.png" alt="">
                </div>
                <p class="weui-tabbar__label">废品框</p>
            </a>
        </div>
    </div>
</div>
<script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
<script src="jquery-weui-build/dist/js/jquery-weui.min.js"></script>
<script src="jquery-weui-build/dist/js/swiper.min.js"></script>
<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
<script>
//    localStorage.setItem(openid,<?php //echo $userinfo["openid"];?>//);
    $("#tab1").load("main.php");
    $("#tab2").load("feipinkuang.html");
    var iSelect = true;
    $(document).on("click", "#allcheck", function() {
        var ck = document.getElementsByClassName("weui-check");
        for (var i = 0; i <= ck.length-1; i++){
            if(ck[i].checked != true)
            {
                iSelect = true;
                break;
            }
            iSelect = false;
        }
        if (iSelect === true){
            for (var i = 0; i <= ck.length-1; i++){
                ck[i].checked = true;
            }
            iSelect = false;
        }else if (iSelect === false){
            for (var i = 0; i <= ck.length-1; i++){
                ck[i].checked = false;
            }
            iSelect = true;
        }
    });
    $(document).on("click", "#continue", function() {
        for (var i = 0; i < $(".weui-check").length; i++ ){
            if($(".weui-check").get(i).checked == true){
                var sessionkey = $(".weui-check").parents('.weui-cell').find('h6').get(i).innerHTML;
                var sessionval = localStorage.getItem($(".weui-check").parents('.weui-cell').find('h6').get(i).innerHTML);
                sessionStorage.setItem(sessionkey, sessionval);

            }
        }
    });

</script>
<script>
    $(function() {
        FastClick.attach(document.body);
    });

</script>
</body>
</html>

