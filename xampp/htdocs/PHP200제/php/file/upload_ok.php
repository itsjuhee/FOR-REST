<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/file/db.php";

    //upload_ok.php
    $file = $_FILES['upload'];
    $fileName = $file['name'];
    $tmp = $file['tmp_name'];
    $uploadUrl = './'.$file['name'];

    if(move_uploaded_file($tmp,$uploadUrl)){
        echo "업로드 성공";
    }else{
        echo "업로드 실패";
    }

    $query = "insert into files (name) values ('$fileName');";
    mysqli_query($dbConnect,$query);

?>

<img src="<?=$fileName?>">




