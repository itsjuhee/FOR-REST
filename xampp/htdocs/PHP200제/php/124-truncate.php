<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "TRUNCATE mymember";
    $res = $dbConnect->query($sql);

    if($res){
        echo "초기화 성공";
    }else{
        echo "초기화 실패";
    }
?>