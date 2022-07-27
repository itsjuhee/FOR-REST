<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT m.name, r.content, r.regTime FROM myMember m JOIN prodReview r ";
    $sql .= "ON (m.myMemberID = r.myMemberID);";

    $res = $dbConnect->query($sql);

    if($res){
        $dataCount = $res->num_rows;

        for($i = 0; $i < $dataCount; $i++){
            $reviewInfo = $res->fetch_array(MYSQLI_ASSOC);
            echo "{$reviewInfo['regTime']} - {$reviewInfo['name']}님, {$reviewInfo['content']}";
            echo "<br>";
        }
    }
?>