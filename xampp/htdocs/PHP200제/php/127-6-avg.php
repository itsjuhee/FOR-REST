<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT avg(math) FROM schoolRecord;";
    $result = $dbConnect->query($sql); //쿼리 송신
    $score = $result->fetch_array(MYSQLI_ASSOC);
    echo '수학점수 평균 : '.$score['avg(math)'];
?>