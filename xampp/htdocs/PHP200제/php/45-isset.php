<?php
    if (isset($str)) {
        echo "변수 str이 존재합니다.";
    } else {
        echo "변수 str이 존재하지 않습니다.";
    }

    echo "<br>";

    $str = false;

    if (isset($str)) {
        echo "변수 str이 존재합니다.";
    } else {
        echo "변수 str이 존재하지 않습니다.";
    }
?>