<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/file/db.php";

    $file = $_FILES['upload'];

    //echo $file['name'][0];
    foreach($file['name'] as $key => $arr){
        $fileName = $file['name'][$key];
        $tmp = $file['tmp_name'][$key];
        $uploadUrl = './'.$file['name'][$key];
        move_uploaded_file($tmp,$uploadUrl);

        $name[$key] = $fileName;
    }

    $query = "insert into files (name,name2) values ('$name[0]','$name[1]');";

    mysqli_query($dbConnect,$query);



   
   

?>




