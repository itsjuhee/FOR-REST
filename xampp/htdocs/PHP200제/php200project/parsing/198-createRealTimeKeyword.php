<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    $sql = "CREATE TABLE realtimekeyword(";
    $sql .= "realtimekeywordID INT UNSIGNED AUTO_INCREMENT,";
    $sql .= "keyword VARCHAR(20),";
    $sql .= "media ENUM('naver','daum'),";
    $sql .= "regTime INT UNSIGNED,";
    $sql .= "PRIMARY KEY(realtimekeywordID))";
    $sql .= "CHARSET=utf8";

    $result = $dbConnect->query($sql);

    if ($result) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }
?>