
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蓝鸥e家</title>
    <link rel="stylesheet" type="text/css" href="weui-master/dist/style/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="jquery-3.2.1.min.js"/>
    <link rel="stylesheet" type="text/css" href="demos.css"/>
    <link rel="stylesheet" href="jquery-weui.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <style type="text/css">
        body {
            background-color: #F8F8F8
        }

        /*#weui-cell__bd-1, #weui-cell__ft-1 {*/
            /*font-size: 14px;*/
            /*line-height: 20px;*/
        /*}*/

        /*#weui-cell__bd-1 {*/
            /*color: #000000;*/
        /*}*/

        /*.weui-cell__ft-1 {*/
            /*content: " ";*/
            /*display: inline-block;*/

            /*border-width: 2px 2px 0 0;*/
            /*!*border-color: #c8c8cd;*!*/
            /*color: #999999;*/
            /*text-align: right;*/

        /*}*/
        /*.weui-cells{*/
            /*margin-left:20px;margin-right: 20px;*/
            /*border: solid 2px rgba(31,153,9,0.8);*/
            /*border-radius: 6px;*/
        /*}*/
    </style>
</head>
<body >
<div class="weui-btn-area" id="qu"><a href="javascript:;" class="weui-btn weui-btn_default" >取消订单</a></div>

<!---->
<script src="fastclick.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<!--<script>-->
<!--    $(function() {-->
<!--        FastClick.attach(document.body);-->
<!--    });-->
<!--</script>-->
<script src="jquery-weui.js"></script>
<!---->
<script>

    $(document).on("click", "#qu", function() {
        $.confirm("您确定要取消订单吗?", "确认删除?", function() {
            $.get("delete.php?orderid=4",function () {
                $.toast("订单已取消");
            });

        }, function() {
            //取消操作
            window.location.href=window.location.href
        });
    });

</script>



</body>
</html>