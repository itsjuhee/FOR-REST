<?php
    namespace agroup;

    function loadUser(){
        return '첫번째 함수';
    }

    namespace bgroup;

    function loadUser(){
        return '두번째 함수';
    }

    echo \agroup\loadUser();
    echo '<br>';
    echo \bgroup\loadUser();
?>