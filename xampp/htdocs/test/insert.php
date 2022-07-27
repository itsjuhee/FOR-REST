<?php
    //insert.php

    include 'db.php';

    $name = $_GET["name"];
    $tel = $_GET["tel"];
    $email = $_GET["email"];
    $date = date("Y-m-d");

    $query = "INSERT INTO member(
        name, tel, email, date
    ) VALUES (
        '$name','$tel','$email','$date'
    )";

    mysqli_query($dbConnect, $query);

    echo "<script>location.href='index.php?name=$name';</script>";
?>









