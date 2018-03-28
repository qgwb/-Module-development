<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/27 0027
 * Time: 下午 5:11
 */
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "hpy";

$db=mysqli_connect($servername,$username,$password,$database);
if(mysqli_connect_errno()){
    echo "ERROR connect";
    exit;
}
//else{
//    echo "Connect Success!";
//}
$typeid = 2004;
    $result = mysqli_query($db,"select * from typedetail where Type_id =".$typeid);
$rownum=mysqli_num_rows($result);
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title></title>
    <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/lib/weui.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
    <style>
        .tupian{
            width: 48px;
            height: 48px;
            margin: 10px;
        }
        .btn{
            width: 100%;
            position: fixed;
            bottom: 0;
        }
        .weui-btn{
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="weui-cells weui-cells_checkbox">';
for($i=0;$i<$rownum;$i++){
    $row=mysqli_fetch_assoc($result);
    echo '<label class="weui-cell weui-check__label" for="s'.$i.'">
        <div class="weui-cell__hd">
            <img src="img/'.$row['Typedetail_id'].'.png" alt="" class="tupian"/>
        </div>
        <div class="weui-cell__bd">
            <h3>'.$row['Typedetail_name'].'</h3>
            <p>'.$row['Typedetail_price'].'</p>
        </div>
        <div class="weui-cell__ft">
            <input type="checkbox" class="weui-check" name="checkbox1" id="s'.$i.'">
            <i class="weui-icon-checked"></i>
        </div>
    </label>';
}
echo '<div class="btn"><a href="javascript:;" class="weui-btn weui-btn_primary">加入废品框</a></div>
<script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
<script src="jquery-weui-build/dist/js/jquery-weui.min.js"></script>
<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>
<script>
    $(\'.weui-btn\').click(function(){
        var ck = document.getElementsByClassName("weui-check");
        for (var i = 0; i < ck.length; i++){
            if(ck[i].checked == true)
            {
                localStorage.setItem($(this).parents(\'body\').find(\'h3\')[i].innerHTML, $(this).parents(\'body\').find(\'p\')[i].innerHTML);
            }
        }
        $.toast("操作成功");
    });
</script>
</body>
</html>';
?>
