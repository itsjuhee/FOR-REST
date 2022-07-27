<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "(SELECT name, email FROM dropOutOld)";
    $sql .= " UNION ALL "; //UNION ALL의 앞뒤에 공백이 있습니다.
    $sql .= "(SELECT name, email FROM dropOutNew)";

    $result = $dbConnect->query($sql); //쿼리 송신

    $dataCount = $result->num_rows;

    for($i = 0; $i < $dataCount; $i++){
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "이름 : ".$memberInfo['name'];
        echo "<br>";
        echo "이메일 : ".$memberInfo['email'];
        echo "<hr>";
    }
?>