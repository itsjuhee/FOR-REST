<?php
    //패턴을 대입
    $pattern = '/^(010|011|016|017|018|019)-[^0][0-9]{3,4}-[0-9]{4}$/';

    $str = '010-8670-0247';

    if (preg_match($pattern, $str, $matches)) {
        echo "값 {$str}은(는) 휴대폰번호정규식 표현에 적합한 값입니다. ";
        echo "<pre>";
        var_dump($matches);
        echo "</pre>";
    }else{
        echo "휴대전화번호 유효성에 맞지 않습니다.";
    }
?>