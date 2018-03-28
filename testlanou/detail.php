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
            border-top: solid 4px rgba(31, 153, 9, 0.8);
            border-bottom: solid 4px rgba(31, 153, 9, 0.8);
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
    //    $orderID=$_POST['orderid'];
    $orderID = $_GET['orderid'];
    if (!$orderID) {
        echo "no data passed!";
        exit;
    }
    @ $db = mysqli_connect('localhost', 'root', '123456', 'lanou');
    if (mysqli_connect_errno()) {
        echo "ERROR connect";
        exit;
    }

    $q = "select * from `order` where Order_ID=".$orderID;
//    $q = "select * from `order` where Order_ID=1";
    $result = mysqli_query($db, $q);//取订单
    $row = mysqli_fetch_assoc($result);

    $q1 = "select * from `citizen` where Cit_ID=" . $row['Cit_ID'];//取市民姓名
    $result1 = mysqli_query($db, $q1);
    $row1 = mysqli_fetch_assoc($result1);

    $q2 = "select * from `recycle` where Rec_ID=" . $row['Rec_ID'];//取回收员姓名
    $result2 = mysqli_query($db, $q2);
    $row2 = mysqli_fetch_assoc($result2);

    $q3 = "SELECT * FROM order_type where  Typedetail_ID=" . $row['Typedetail_ID'] . " and Order_ID=" . $row['Order_ID'];//取市民姓名
    $result3 = mysqli_query($db, $q3);//取数量
    $row3 = mysqli_fetch_assoc($result3);

    $q4 = "select * from `typedetail` where Typedetail_id=" . $row['Typedetail_ID'];//取类别名称
    $result4 = mysqli_query($db, $q4);//取数量
    $row4 = mysqli_fetch_assoc($result4);
    echo "<div class=\"weui-form-preview__hd\">
        <label class=\"weui-form-preview__label\">回收金额</label>
        <em class=\"weui-form-preview__value\">¥" . $row['Order_money'] . "</em></div>";

    echo "<div class=\"weui-form-preview__bd\">
        <div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">订单编号</label>
            <span class=\"weui-form-preview__value\">" . $row['Order_ID'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">当前状态</label>
            <span class=\"weui-form-preview__value\">" . $row['Order_state'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">姓名</label>
            <span class=\"weui-form-preview__value\">" . $row1['Cit_name'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">时间</label>
            <span class=\"weui-form-preview__value\">" . $row['Order_time'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">电话</label>
            <span class=\"weui-form-preview__value\">" . $row1['Cit_phone'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">地址</label>
            <span class=\"weui-form-preview__value\">" . $row1['Cit_address'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">回收员姓名</label>
            <span class=\"weui-form-preview__value\">" . $row2['Rec_name'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">回收员电话</label>
            <span class=\"weui-form-preview__value\">" . $row2['Rec_phone'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">种类</label>
            <span class=\"weui-form-preview__value\">" . $row4['Typedetail_name']." ".$row3['count']." ".$row4['Typedetail_unit'] . "</span></div>";
    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">备注</label>
            <span class=\"weui-form-preview__value\">" . $row['Order_other'] . "</span></div></div>";


    ?>

</div>
<div class="weui-btn-area"><a href="javascript:;" class="weui-btn weui-btn_default">取消订单</a></div>
</body>
</html>