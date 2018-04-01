<?php
$id=$_GET['orderid'];

function delete($id)
{//取消订单
    echo $id;
    if (!$id) {
        echo "no data passed!";
        exit;
    }
    @ $db = mysqli_connect('106.14.177.245', 'root', '31501370', 'lanou');
    if (mysqli_connect_errno()) {
        echo "ERROR connect";
        exit;
    }

    $q = "delete from `order` where Order_ID=" . $id;
    $result = mysqli_query($db, $q);//取订单

    mysqli_close($db);
}
delete($id);
?>