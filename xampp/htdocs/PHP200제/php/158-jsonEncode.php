<?php
    $arr = ['n'=>100,'b'=>200,'c'=>300];
    $arrJson = json_encode(
        $arr
    );
    
    $json = json_decode($arrJson,true);

    var_dump($json);
?>