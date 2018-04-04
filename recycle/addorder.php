<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详细信息</title>
    <link rel="stylesheet" type="text/css" href="weui-master/dist/style/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.css"/>
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
<?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $database = "lanou";
    $j=0;
    $db=mysqli_connect($servername,$username,$password,$database);
    if(mysqli_connect_errno()){
    echo "ERROR connect";
    exit;
}
    $Orderid = $_GET["Orderid"];
    $rowid=$_GET["rowid"];
    $number=$_GET["number"];
    $price=$_GET["price"];

    $price=round($price,1);
    $number=explode(",",$number);
    $rowid=explode(",",$rowid);
    for($i=0;$i<count($number);$i++){
        $number[$i]=(double)$number[$i];
        $rowid[$i]=(string)$rowid[$i];
    }


    $sql="update order1 set Order_money=".$price." , Order_state='交易成功' where Order_ID=".$Orderid;
    for($i=0;$i<count($number);$i++){
        $a=$number[$i];
        $b=$rowid[$i];
        $sq2="update order_type set `count`= $a where Typedetail_ID= $b and Order_ID =$Orderid";
        $result=mysqli_query($db,$sq2);
    }
   $res=mysqli_query($db,$sql);

?>
</body>
</html>