<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "CREATE TABLE test (";
    $sql .= "myMemberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "PRIMARY KEY (myMemberID))";

    $res = $dbConnect->query($sql);

    if ( $res ) {
        echo "테이블 생성 완료";

    } else {
        echo "테이블 생성 실패";
    }
?>