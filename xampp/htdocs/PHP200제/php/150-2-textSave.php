<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $text = addslashes($_POST['text']);

    $sql = "INSERT INTO prodReview(myMemberID, content, regTime) ";
    $sql .= "VALUES(1,'{$text}',NOW())";
    echo $sql;
    echo '<br>';

    $res = $dbConnect->query($sql);

    if($res){
        echo "입력 성공";
    }else{
        echo '입력 실패';
    }
?>