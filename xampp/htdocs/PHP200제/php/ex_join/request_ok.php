<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/ex_join/db.php";

    $id = $_GET['id'];
    $pw = $_GET['pw'];
    $s = $_GET['s'];
    $city = $_GET['city'];
    $what = implode('/',$_GET['what']);
    $content = $_GET['content'];
    
    if(!isset($_GET['mode'])){
        $query = "INSERT INTO join_(
            id, pw, sex, city, what, content
        ) VALUES (
            '$id','$pw','$s','$city','$what','$content'
        )";
    }else{
        $num = $_GET['num'];
        $query = "update join_ set id='$id',pw='$pw',sex='$s',city='$city',
        what='$what',content='$content' 
        where num='$num'";       
    }

    mysqli_query($dbConnect, $query);

    echo "<script>
            location.href='index.php';
          </script>";

?>