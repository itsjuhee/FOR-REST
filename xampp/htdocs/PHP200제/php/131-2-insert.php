<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "INSERT INTO myMember(userId, name, password, ";
    $sql .= "phone, email, birthDay, gender, regTime) ";
    $sql .= "VALUES('pepper', '페퍼', 'vpvjeptm', '010-1234-5678',";
    $sql .= "'miu@everdevel.com', '2015-11-18', 'm', now());";

    $result = $dbConnect->query($sql); //쿼리 송신

    if( $result ) {
        echo "입력 완료";
    } else {
        echo "입력 실패";
    }
?>