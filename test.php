
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蓝鸥e家</title>
   <link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/lib/weui.min.css">
	<link rel="stylesheet" type="text/css" href="jquery-weui-build/dist/css/jquery-weui.min.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <style type="text/css">
        body {
            background-color: #F8F8F8
        }

        #weui-cell__bd-1, #weui-cell__ft-1 ,#weui-cell__bd-2,#weui-cell__ft-2{
            font-size: 14px;
            line-height: 20px;
        }

        #weui-cell__bd-1,#weui-cell__bd-2 {
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
<body onload="changecolor()">


<div class="weui-cells">
    <a class="weui-cell weui-cell_access" href="detail.html" >
        <div class="weui-cell__bd">
            <p>订单详情</p>
        </div>
        <div class="weui-cell__ft">
            查看
        </div>
    </a>
    <div style="width: 100%;height: 1px;background-color: #999"></div>
    <a href="detail.html">
        <div class="weui-cell weui-cell_access" >
            <div class="weui-cell__bd" id="weui-cell__bd-2">
                <p>交易单号</p>
                <p>金额</p>
                <p>时间</p>
                <p>状态</p>
            </div>
            <div class="weui-cell__ft-1" id="weui-cell__ft-2">
                <p>jhn987654321</p>
                <p> &nbsp;</p>
                <p>2018-01-20</p>
                <p class="state">待回收</p>
            </div>
        </div>
    </a>
</div>

<!--<div class="weui-cells">-->
<!--    <a class="weui-cell weui-cell_access" href="detail.html">-->
<!--        <div class="weui-cell__bd">-->
<!--            <p>订单详情</p>-->
<!--        </div>-->
<!--        <div class="weui-cell__ft">-->
<!--            查看-->
<!--        </div>-->
<!--    </a>-->
<!--    <div style="width: 100%;height: 1px;background-color: #999"></div>-->
<!--    <a href="detail.html">-->
<!--        <div class="weui-cell weui-cell_access" style="padding-top: 4px; padding-bottom: 4px;">-->
<!--            <div class="weui-cell__bd" id="weui-cell__bd-1">-->
<!--                <p>交易单号</p>-->
<!--                <p>金额</p>-->
<!--                <p>时间</p>-->
<!--                <p>状态</p>-->
<!--            </div>-->
<!--            <div class="weui-cell__ft-1" id="weui-cell__ft-1">-->
<!--                <p>jhn123456789</p>-->
<!--                <p>20.18</p>-->
<!--                <p>2018-01-19</p>-->
<!--                <p style="color:#00dc00">交易成功</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </a>-->
<!--</div>-->
<script type="text/javascript">
    	function changecolor(){
    		var x = document.getElementsByClassName("state");
    		console.log(x[0].innerHTML);
    		if (x[0].innerHTML === "待回收")
    		{
    			x[0].style.color = "red";
    		}
    	}
//  	window.onload = function (){
//  		var x = document.getElementsByClassName("state");
//  		console.log(x[0].innerHTML);
//  		if (x[0].innerHTML === "待回收")
//  		{
//  			x[0].style.color = "#ff0000";
//  		}
//  	}
</script>
</body>
</html>