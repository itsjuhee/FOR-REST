<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SHOW TABLES";
    $res = $dbConnect->query($sql);

    if ( $res ) {
        echo "테이블 목록 <br>";

        while($list = $res->fetch_array(MYSQLI_BOTH)){
            echo $list['Tables_in_php200example'];
            echo '<br>';
        }
    } else {
        echo "테이블 존재 안함";
    }
?>