<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/file/db.php";

    $query = "select * from files order by num desc ";
    $result = mysqli_query($dbConnect, $query);
    
    while($row = mysqli_fetch_array($result)){
        $data = "<li><img src='{$row['name']}'></li>";
    }
?>
<style>img{width:100px;}</style>
<ul>
    <?=$data?>
</ul>