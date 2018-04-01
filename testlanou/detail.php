<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详细信息</title>
    <link rel="stylesheet" type="text/css" href="weui-master/dist/style/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="jquery-3.2.1.min.js"/>
    <link rel="stylesheet" type="text/css" href="demos.css"/>
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
        #qu{display: none;}
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
//        $orderID=$_POST['orderid'];
    $orderID = $_GET['orderid'];
    if (!$orderID) {
        echo "no data passed!";
        exit;
    }
    @ $db = mysqli_connect('106.14.177.245', 'root', '31501370', 'lanou');
    if (mysqli_connect_errno()) {
        echo "ERROR connect";
        exit;
    }

    $q = "select * from `order` where Order_ID=".$orderID;
    $result = mysqli_query($db, $q);//取订单
    $row = mysqli_fetch_assoc($result);

    $q1 = "select * from `citizen` where Cit_ID=" . $row['Cit_ID'];//取市民姓名
    $result1 = mysqli_query($db, $q1);
    $row1 = mysqli_fetch_assoc($result1);

    $q2 = "select * from `recycle` where Rec_ID=" . $row['Rec_ID'];//取回收员姓名
    $result2 = mysqli_query($db, $q2);
    $row2 = mysqli_fetch_assoc($result2);

//    $q4 = "select * from `typedetail` where Typedetail_ID=" . $row['Typedetail_ID'];//取类别名称
//    $result4 = mysqli_query($db, $q4);//取单位
//    $row4 = mysqli_fetch_assoc($result4);
    echo "<div class=\"weui-form-preview__hd\">
        <label class=\"weui-form-preview__label\">回收金额</label>
        <em class=\"weui-form-preview__value\">¥" . $row['Order_money'] . "</em></div>";

    echo "<div class=\"weui-form-preview__bd\">
        <div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">订单编号</label>
            <span class=\"weui-form-preview__value\" id='id1'>" . $row['Order_ID'] . "</span></div>";

    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">当前状态</label>
            <span class=\"weui-form-preview__value\" id='qu1'>" . $row['Order_state'] . "</span></div>";

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
            <span class=\"weui-form-preview__value\">";

    $q3 = "select * from  `order`,order_type,typedetail where `order`.Order_ID=order_type.Order_ID and order_type.Typedetail_ID=typedetail.Typedetail_ID AND  `order`.Order_ID=" . $row['Order_ID'];//取订单种类
    $result3 = mysqli_query($db, $q3);//取数量
    $rownum=mysqli_num_rows($result3);
    for($i=0;$i<$rownum;$i++){
        $row3 = mysqli_fetch_assoc($result3);
        echo $row3['Typedetail_name']." ".$row3['count']." ".$row3['Typedetail_unit'] ;
    }
    echo "</span></div>";
//    echo "<div class=\"weui-form-preview__item\">
//            <label class=\"weui-form-preview__label\">种类</label>
//            <span class=\"weui-form-preview__value\">" . $row3['Typedetail_name']." ".$row3['count']." ".$row3['Typedetail_unit'] . "</span></div>";
    echo "<div class=\"weui-form-preview__item\">
            <label class=\"weui-form-preview__label\">备注</label>
            <span class=\"weui-form-preview__value\">" . $row['Order_other'] . "</span></div></div>";
    ?>

</div>
<div class="weui-btn-area" id="qu"><a href="javascript:;" class="weui-btn weui-btn_default" >取消订单</a></div>
<script src="fastclick.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>
<script src="jquery-weui.js"></script>

<script>
    var z=document.getElementById("id1").innerHTML;

    $(document).on("click", "#qu", function() {
        $.confirm("您确定要取消订单吗?", "确认删除?", function() {

            $.get("delete.php?orderid="+z,function () {
                $.toast("订单已取消");
                window.location.href="index.php?orderid="+<?php echo $row['Cit_ID']?>
            });

        }, function() {
            //取消操作
            window.location.href=window.location.href
        });
    });

</script>

<script type="text/javascript">
    window.onload =function () {
            var x=document.getElementById("qu");
            var y=document.getElementById("qu1");
                console.log(x.innerHTML);
                    console.log(y.innerHTML);
                if (y.innerHTML === "待回收")
                {
                    x.style.display = "block";
                }
        }

</script>
</body>
</html>