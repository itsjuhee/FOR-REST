<?php
    function checkInt($int){
        $intCheck = filter_Var($int, FILTER_VALIDATE_INT);
        if ($intCheck) {
            echo "{$int}는 정수입니다.";
        } else {
            echo "{$int}는 정수가 아닙니다.";
        }
        echo '<br>';
    }

    checkInt(694);
    checkInt(1.25);
    checkInt('hello');
?>