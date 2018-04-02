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

$db=mysqli_connect($servername,$username,$password,$database);
if(mysqli_connect_errno()){
    echo "ERROR connect";
    exit;
}
$Orderid = $_GET["Order_ID"];
$sql="select * from order1 where Order_ID=".$Orderid;
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($result);
$citid=$row["Cit_ID"];
$resultcit=mysqli_query($db,"select * from citizen where Cit_ID=".$citid);
$rowcit=mysqli_fetch_assoc($resultcit);
$resultre=mysqli_query($db,"select * from order_type where Order_ID=".$Orderid);
$rowrenames=array();
$rowprice=array();
$rowid=array();
$num=array();
$rownum=mysqli_num_rows($resultre);
for($i=0;$i<$rownum;$i++){
    $rowre = mysqli_fetch_assoc($resultre);
    $num[$i]=(int)$rowre["count1"];
    $rowid[$i]=$rowre["Typedetail_ID"];
    $rs=mysqli_query($db,"select * from typedetail where Typedetail_id=".$rowre["Typedetail_ID"]);
    $ro=mysqli_fetch_assoc($rs);
    $rowrenames[$i]=(string)$ro["Typedetail_name"];
    $rowprice[$i]=$ro["Typedetail_price"];
}
$nameJson = json_encode($rowrenames);
$numJson=json_encode($num);
$priceJson=json_encode($rowprice);
$rowidJson=json_encode($rowid);
if($row['Order_state']=="待回收"){
echo '<div class="weui-cells">
    <div class="weui-cell" style="margin-left: 5px;">
        <!--<div class="weui-cell__hd"><img src="123.jpg" width="16px" height="16px"></div>-->
        <div class="weui-cell__bd">
            <p>蓝鸥e家</p>
        </div>
        <div class="weui-cell__ft"></div>
    </div>
</div>
<div style="color: #F8F8F8;height: 20px;width: 100%;"></div>
<div class="weui-form-preview">
    <div class="weui-form-preview__hd">
        <label class="weui-form-preview__label">回收金额</label>
        <em id="all-price" class="weui-form-preview__value">xx.xx</em>
    </div>
    <div class="weui-form-preview__bd">
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">订单编号</label>
            <span class="weui-form-preview__value">'.$row["Order_ID"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">当前状态</label>
            <span class="weui-form-preview__value">'.$row["Order_state"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">姓名</label>
            <span class="weui-form-preview__value" >'.$rowcit["Cit_name"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">时间</label>
            <span class="weui-form-preview__value">'.$row["Order_time"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">电话</label>
            <span class="weui-form-preview__value">'.$rowcit["Cit_name"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">地址</label>
            <span class="weui-form-preview__value">'.$rowcit["Cit_address"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">备注</label>
            <span class="weui-form-preview__value">'.$row["Order_other"].'</span>
        </div>
    </div>
     <div class="weui-cells">
        <div class="weui-cell weui-cell_bd" >
            <div class="weui-cell__bd">
                <p>废品重量(单位kg/节/个)</p>
            </div>
        </div>
        <div style="width: 100%;height: 1px;background-color: #999"></div>
            <div id="price" class="weui-cell weui-cell_access" style="padding-top: 4px; padding-bottom: 4px; ">
                <div id="re-name" class="weui-cell__bd" id="weui-cell__bd-1" >
                </div>
                <div id="re-weight" class="weui-cell__ft-1" id="weui-cell__ft-1">
                </div>
            </div>
    </div>

    </div>

</div>

<div  id="btn1" class="weui-btn-area" ><a href="javascript:;" class="weui-btn weui-btn_default">完成订单</a></div>
<script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
<script src="jquery-weui-build/dist/js/jquery-weui.js"></script>
<script >
    var recylename=[];
    var weight=[];
    var Orderid='.$Orderid.';
    var qwe='.$nameJson.';
    var asd='.$numJson.';
    var rowprice='.$priceJson.';
    var rowid='.$rowidJson.';
    for(var i=0;i<'.$rownum.';i++){
    var qun=[];
    var allnum=[];

    recylename[i]=qwe[i];
    weight[i]=asd[i];
    }
    var num= recylename.length;
    for(var i=0;i<num;i++) {
        $(\'#re-name\').append("<p>"+ recylename[i]+"</p>");
        $(\'#re-weight\').append("<p><input type=\'number\' class=\'weui-input\' value=\'"+weight[i]+"\'></p>");
    }
    var price=0;
    for(var i=0;i<num;i++) {
        price=price+weight[i]*rowprice[i];
    }
    for(var i=0;i<num;i++) {
        allnum[i]=weight[i];
    }
    price=price.toFixed(1);
    var tprice=price;
    $(\'#all-price\').text("¥"+price);
    $(function(){

        $(\'input\').bind(\'input propertychange\', function() {
            var obj = $(\'input\');
            function out() {

                var pric1=0;
                tprice=0;
                $.each(obj, function (key, val) {
                    if(obj[key].value!="")
                    pric1 += parseInt(obj[key].value)*rowprice[key];
                    allnum[key]=parseInt(obj[key].value);
                    tprice=tprice+allnum[key]*rowprice[key];
                });

                return pric1;
            }
            $(\'#all-price\').text("¥"+out().toFixed(1));
        });

    })

     $(document).on("click", "#btn1", function() {
        $.confirm("确认提交订单", function() {
            //点击确认后的回调函数
            $.get("addorder.php?Orderid="+Orderid+"&rowid="+rowid+"&number="+allnum+"&price="+tprice,function(){
            window.location.href="reindex.php";
});
        }, function() {
            //点击取消后的回调函数
        });
    });
</script>';}
    else{
        echo '<div class="weui-cells">
    <div class="weui-cell" style="margin-left: 5px;">
        <!--<div class="weui-cell__hd"><img src="123.jpg" width="16px" height="16px"></div>-->
        <div class="weui-cell__bd">
            <p>蓝鸥e家</p>
        </div>
        <div class="weui-cell__ft"></div>
    </div>
</div>
<div style="color: #F8F8F8;height: 20px;width: 100%;"></div>
<div class="weui-form-preview">
    <div class="weui-form-preview__hd">
        <label class="weui-form-preview__label">回收金额</label>
        <em id="all-price" class="weui-form-preview__value">¥'.$row["Order_money"].'</em>
    </div>
    <div class="weui-form-preview__bd">
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">订单编号</label>
            <span class="weui-form-preview__value">'.$row["Order_ID"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">当前状态</label>
            <span class="weui-form-preview__value">'.$row["Order_state"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">姓名</label>
            <span class="weui-form-preview__value" >'.$rowcit["Cit_name"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">时间</label>
            <span class="weui-form-preview__value">'.$row["Order_time"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">电话</label>
            <span class="weui-form-preview__value">'.$rowcit["Cit_name"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">地址</label>
            <span class="weui-form-preview__value">'.$rowcit["Cit_address"].'</span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">备注</label>
            <span class="weui-form-preview__value">'.$row["Order_other"].'</span>
        </div>
    </div>
        </div>';
    }
?>

</body>
</html>