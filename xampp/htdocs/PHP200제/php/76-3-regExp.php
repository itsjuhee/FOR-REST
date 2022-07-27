<?php
    //패턴을 대입
    $pattern = '/^[a-zA-Z가-힣. ]+$/';


    $str = '안녕하세요. Hello.'; //요. 다음에 띄어쓰기가 있습니다.

    if (preg_match($pattern, $str, $matches)) {
        echo "값 {$str}은(는) 정규식 표현에 적합한 값입니다. ";
        echo "<pre>";
        var_dump($matches);
        echo "</pre>";
    }else{
        echo "값에 영문, 한글 .(점) 그리고 띄어쓰기외의 문자가 있는지 확인요망";
    }
?>