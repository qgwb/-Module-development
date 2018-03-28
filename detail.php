<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详细信息</title>
    <link rel="stylesheet" type="text/css" href="weui-master/dist/style/weui.min.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <style type="text/css">
        .weui-form-preview {
            margin-right: 20px;
            margin-left: 20px;
            border-top: solid 4px rgba(31,153,9,0.8);
            border-bottom: solid 4px rgba(31,153,9,0.8);
        }
        body {
            background-color: #F8F8F8
        }
    </style>
</head>
<body>
<div class="weui-cells">
    <div class="weui-cell" style="margin-left: 5px;">
        <div class="weui-cell__bd">
            <p>蓝鸥e家</p>
        </div>
        <div class="weui-cell__ft"></div>
    </div>
</div>
<div style="color: #F8F8F8;height: 20px;width: 100%;"></div>
<div class="weui-form-preview">
    <?php
//
//    if(!$orderID){
//        echo "no data passed!";
//        exit;
//    }
    @ $db=mysqli_connect('localhost','root','123456','hpy');
    if(mysqli_connect_errno()){
        echo "ERROR connect";
        exit;
    }
    else{
        echo "Connect Success!";
    }
    $q="select * from `order` where Order_ID=";
    $result=mysqli_query($db,$q);
    $rownum=mysqli_num_rows($result);
    for($i=0;$i<$rownum;$i++){
        $row=mysqli_fetch_assoc($result);
        $q2="select * from `citizen` where Cit_ID=".$row['Cit_ID'];
        $result2=mysqli_query($db,$q2);
        $row1=mysqli_fetch_assoc($result2);
        echo "<div class=\"weui-form-preview__hd\">
        <label class=\"weui-form-preview__label\">回收金额</label>
        <em class=\"weui-form-preview__value\">¥".$row['Order_money']."</em></div>";

        echo "<div class=\"weui-form-preview__bd\">
        <div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">订单编号</label>
            <span class=\"weui-form-preview__value\">".$row['Order_ID']."</span></div>";

        echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">当前状态</label>
            <span class=\"weui-form-preview__value\">".$row['Order_state']."</span></div>";

        echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">姓名</label>
            <span class=\"weui-form-preview__value\">".$row1['Cit_name']."</span></div>";

        echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">时间</label>
            <span class=\"weui-form-preview__value\">".$row['Order_time']."</span></div>";

        echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">电话</label>
            <span class=\"weui-form-preview__value\">".$row1['Cit_phone']."</span></div>";

        echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">地址</label>
            <span class=\"weui-form-preview__value\">".$row1['Cit_address']."</span></div>";

        echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">备注</label>
            <span class=\"weui-form-preview__value\">".$row['Order_other']."</span></div></div>";
    }

    ?>

</div>
<div class="weui-btn-area"><a href="javascript:;" class="weui-btn weui-btn_default">取消订单</a></div>
</body>
</html>