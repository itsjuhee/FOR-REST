<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember DROP natiolity";
    $res = $dbConnect->query($sql);

    if ( $res ) {
        echo "필드삭제 완료";

    } else {
        echo "필드삭제 실패";
    }
?>