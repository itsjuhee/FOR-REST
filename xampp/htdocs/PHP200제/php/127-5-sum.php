<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT sum(english) FROM schoolRecord";
    $result = $dbConnect->query($sql); //쿼리 송신
    $score = $result->fetch_array(MYSQLI_ASSOC);
    echo ' 영어점수 합계 : '.$score['sum(english)'];
?>