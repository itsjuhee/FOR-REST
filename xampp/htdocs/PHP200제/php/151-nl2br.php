<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT * FROM prodReview ORDER BY prodReviewID DESC LIMIT 1";
    $res = $dbConnect->query($sql);

    $prodReview = $res->fetch_array(MYSQLI_ASSOC);
    echo nl2br($prodReview['content']);

?>