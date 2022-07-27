<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    //마지막에 스페이스 입력합니다.
    $sql = "ALTER TABLE myMember MODIFY natiolity ";
    $sql .= "varchar(15) comment '국적' AFTER gender";
    $res = $dbConnect->query($sql);

    if ( $res ) {
        echo "필드정보 변경 완료";

    } else {
        echo "필드정보 변경 실패";
    }
?>