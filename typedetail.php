<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28 0028
 * Time: 下午 9:07
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
$typedetailid = $_GET['typedetailid'];
$result = mysqli_query($db,"select * from typedetail where Typedetail_id = ".$typedetailid);
$rownum=mysqli_num_rows($result);
echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title></title>
		<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/lib/weui.min.css">
		<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
		</head>
	    <body ontouchstart>';
    $row = mysqli_fetch_assoc($result);
    echo '<div style="text-align: center; width: 100%;">
      <h3 style="padding-top: 20px">' . $row['Typedetail_name'] . '</h3>
    <img alt="" src="img/' . $typedetailid . '.png" style="display: inline-block;width: 80px;height: 80px;padding: 35px 0;" />

  </div>
  <div style="text-align: center; width: 100%;margin-top: 25px;">
      <div class="weui-cells weui-cells_form">
          <div class="weui-cell">
              <div class="weui-cell__bd">
                  <label>单价：' . $row['Typedetail_price'] . '元/' . $row['Typedetail_unit'] . '</label>
              </div>
          </div>
          <div class="weui-cell">
              <div class="weui-cell__hd"><label class="weui-label">预估量：</label></div>
              <div class="weui-cell__bd" style="width: 20%">
                  <input class="weui-input" type="number" style="text-align:center;" pattern="[0-9]*" oninput="if(value.length>3)value=value.slice(0,3)" placeholder="请输入数量/重量">
              </div>
                  <label class="weui-label">' . $row['Typedetail_unit'] . '</label>
          </div>
          <div class="weui-cell">
              <div class="weui-cell__bd">
                  <label>预估价：¥<span style="color:red">0.00</span></label>
              </div>
          </div>
      </div>
  </div>';
echo '<a href="javascript:;" class="weui-btn weui-btn_primary" style="margin: 20px">加入废品框</a>
        <script src="jquery-weui-build/dist/lib/jquery-2.1.4.js"></script>
		<script src="jquery-weui-build/dist/js/jquery-weui.min.js"></script>
		<script src="jquery-weui-build/dist/js/swiper.min.js"></script>
		<script src="jquery-weui-build/dist/lib/fastclick.js"></script>
		<script>
      $(\'.weui-input\').bind(\'input propertychange\',function(){
          if($(this).val()!=""){
              $(\'span\').html(($(this).val()*' . $row['Typedetail_price'] . ').toFixed(2));
          }
          else{
              $(\'span\').html(0.00.toFixed(2));
          }
      })

      $(".weui-btn").click(function(){
        if($(".weui-input").val() != ""){
            var obj = {Typedetail_name:"' . $row['Typedetail_name'] . '", Typedetail_price:"' . $row['Typedetail_price'] . '",Typedetail_unit:"' . $row['Typedetail_unit'] . '", Order_money:$(\'span\').html(), count:$(".weui-input").val()};
            localStorage.setItem(' . $typedetailid . ', JSON.stringify(obj));
             $.modal({
              title: "添加成功",
              text: "废品已成功添加到废品框啦！",
              buttons: [
                { text: "返回上一页",onClick: function(){ window.history.back(-1); } },
                { text: "回到主页", onClick: function(){ window.location.href = "tabbar.html" ;} },
  ]
            });
        }
        else{
            $.toast(\'请输入数量!\', \'cancel\');
        }

      })
  </script>

  </body>

</html>';
?>