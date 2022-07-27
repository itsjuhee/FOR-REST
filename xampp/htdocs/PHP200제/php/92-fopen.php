<?php
    $fopen = fopen('helloworld.txt','r+');
    if ($fopen) {
        echo "파일을 열었습니다.";
    } else {
        echo "파일을 여는데 실패했습니다.";
    }
?>