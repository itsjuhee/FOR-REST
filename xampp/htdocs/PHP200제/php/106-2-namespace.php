<?php
    namespace agroup;

    class user{
        function loadUser(){
            return '첫번째 클래스의 메서드';
        }
    }

    namespace bgroup;

    class user{
        function loadUser(){
            return '두번째 클래스의 메서드';
        }
    }

    $aUser = new \agroup\user;
    echo $aUser->loadUser();
    echo '<br>';
    $bUser = new \bgroup\user;
    echo $bUser->loadUser();
?>