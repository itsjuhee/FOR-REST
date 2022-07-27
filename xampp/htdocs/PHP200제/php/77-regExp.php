<?php
    //패턴을 대입
    $pattern = '/^[0-9]+$/';

    $str = 123456;

    if (preg_match($pattern, $str, $matches)) {
        echo "값 {$str}은(는) 정규식 표현에 적합한 값입니다. ";
        echo "<pre>";
        var_dump($matches);
        echo "</pre>";
    }else{
        echo "값에 숫자외의 문자가 있는지 확인요망";
    }
?>