<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT name, userId FROM myMember";
    $result = $dbConnect->query($sql);

    $dataCount = $result->num_rows;

    for($i = 0; $i < $dataCount; $i++){
        $memberInfo = $result->fetch_array(MYSQLI_BOTH);
        echo "이름 : ".$memberInfo[0];
        echo "<br>";
        echo "아이디 : ".$memberInfo['userId'];
        echo "<hr>";
    }
?>