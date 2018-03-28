
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蓝鸥e家</title>
    <link rel="stylesheet" type="text/css" href="weui-master/dist/style/weui.min.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <style type="text/css">
        body {
            background-color: #F8F8F8
        }

        #weui-cell__bd-1, #weui-cell__ft-1{
            font-size: 14px;
            line-height: 20px;
        }

        #weui-cell__bd-1 {
            color: #000000;
        }

        .weui-cell__ft-1 {
            content: " ";
            display: inline-block;

            border-width: 2px 2px 0 0;
            /*border-color: #c8c8cd;*/
            color: #999999;
            text-align: right;

        }
        .weui-cells{
            margin-left:20px;margin-right: 20px;
            border: solid 2px rgba(31,153,9,0.8);
            border-radius: 6px;
        }
    </style>
</head>
<body>



<?php
@ $db=mysqli_connect('localhost','root','123456','lanou');
if(mysqli_connect_errno()){
    echo "ERROR connect";
    exit;
}
$q="select * from `order` where Cit_ID='112'";
$result=mysqli_query($db,$q);
$rownum=mysqli_num_rows($result);
for($i=0;$i<$rownum;$i++){
    $row=mysqli_fetch_assoc($result);
    echo " <div class=\"weui-cells\">
    <a class=\"weui-cell weui-cell_access\" href=\"detail.php?orderid=".$row['Order_ID']."\">
        <div class=\"weui-cell__bd\">
            <p>订单详情</p>
        </div>
        <div class=\"weui-cell__ft\">
            查看
        </div>
    </a>
    <div style=\"width: 100%;height: 1px;background-color: #999\"></div><a href=\"detail.php?orderid=".$row['Order_ID']."\">
        <div class=\"weui-cell weui-cell_access\" style=\"padding-top: 4px; padding-bottom: 4px;\">
            <div class=\"weui-cell__bd\" id=\"weui-cell__bd-1\">
                <p>交易单号</p>
                <p>金额</p>
                <p>时间</p>
                <p>状态</p>
            </div>
            <div class=\"weui-cell__ft-1\" id=\"weui-cell__ft-1\"><p>".$row['Order_ID']."</p>";
    if($row['Order_money']!=null){
        echo "<p>".$row['Order_money']."</p>";
    }else{
        echo "<p>"."&nbsp;"."</p>";
    }
    echo "<p>".$row['Order_time']."</p>";
    echo "<p class=\"state\">".$row['Order_state']."</p> </div>
        </div>
    </a>
</div>";
}
mysqli_free_result($result);
mysqli_close($db);
?>


<script type="text/javascript">
    window.onload =function () {
        var x=document.getElementsByClassName("state");

        for(var i=0;i<x.length;i++){
            console.log(x[i].innerHTML);
            if (x[i].innerHTML === "待回收")
            {
                x[i].style.color = "red";
            }else if (x[i].innerHTML === "交易成功"){
                x[i].style.color = "#00dc00";
            }
        }


    }

</script>
</body>
</html>