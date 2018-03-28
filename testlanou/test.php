
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

        #weui-cell__bd-1, #weui-cell__ft-1 {
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
                $q="select * from `order` where Order_ID=1";
                $result=mysqli_query($db,$q);//取订单
                $row=mysqli_fetch_assoc($result);

                $q1="select * from `citizen` where Cit_ID=".$row['Cit_ID'];//取市民姓名
                $result1=mysqli_query($db,$q1);
                $row1=mysqli_fetch_assoc($result1);

                $q2="select * from `recycle` where Rec_ID=".$row['Rec_ID'];//取回收员姓名
                $result2=mysqli_query($db,$q2);
                $row2=mysqli_fetch_assoc($result2);

                $q3="SELECT * FROM order_type where  Typedetail_ID=".$row['Typedetail_ID']." and Order_ID=".$row['Order_ID'];//取市民姓名
                $result3=mysqli_query($db,$q3);//取数量
                $row3=mysqli_fetch_assoc($result3);

                $q4="select * from `typedetail` where Typedetail_id=".$row['Typedetail_ID'];//取类别名称
                $result4=mysqli_query($db,$q4);//取数量
                $row4=mysqli_fetch_assoc($result4);

                echo "orderid= ".$row['Order_ID']."<br />";
                echo "Citid= ".$row['Cit_ID']."<br />";
                echo "Recid= ".$row['Rec_ID']."<br />";

                echo "Citname= ".$row1['Cit_name']."<br />";
                echo "Citphone= ".$row1['Cit_phone']."<br />";
                echo "Citaddress= ".$row1['Cit_address']."<br />";

                echo "Recname= ".$row2['Rec_name']."<br />";
                echo "Recphone= ".$row2['Rec_phone']."<br />";

                echo "Typeid= ".$row['Type_ID']."<br />";
                echo "detailid= ".$row['Typedetail_ID']."<br />";
                echo "detailcount= ".$row4['Typedetail_name']." ".$row3['count']." ".$row4['Typedetail_unit']."<br />";

                echo "ordermoney= ".$row['Order_money']."<br />";
                echo "time= ".$row['Order_time']."<br />";
                echo "other= ".$row['Order_other']."<br />";
                echo "state= ".$row['Order_state']."<br />";
                ?>
<!--<script type="text/javascript">-->
<!--    window.onload =function () {-->
<!--        var x = document.getElementsByClassName("state");-->
<!--        document.getElementsByClassName("weui-cell weui-cell_access").onclick();-->
<!--        for (var i = 0; i < x.length; i++) {-->
<!--            console.log(x[i].innerHTML);-->
<!--            if (x[i].innerHTML === "待回收") {-->
<!--                x[i].style.color = "red";-->
<!--            } else if (x[i].innerHTML === "交易成功") {-->
<!--                x[i].style.color = "#00dc00";-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->


</body>
</html>