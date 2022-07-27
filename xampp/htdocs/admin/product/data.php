<?
include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";


//update
    $ct1 = $_POST['ct1'];
    $ct1_name = $_POST['ct1_name'];
    $query = "update code1 set ct1='$ct1',name='$ct1_name' where ct1 = '$ct1'";
    mq($query);

    echo "업데이트 완료";
?>





