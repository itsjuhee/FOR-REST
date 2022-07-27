<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember CHANGE currentAge natiolity int";
    $res = $dbConnect->query($sql);

    if ( $res ) {
        echo "필드명 변경 완료";

    } else {
        echo "필드명 변경 실패";
    }
?>