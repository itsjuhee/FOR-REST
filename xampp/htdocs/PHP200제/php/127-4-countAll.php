<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT count(*) FROM schoolRecord";
    $result = $dbConnect->query($sql); //쿼리 송신
    $reviewInfo = $result->fetch_array(MYSQLI_ASSOC);
    echo '레코드 수 : '.$reviewInfo['count(*)'];
?>