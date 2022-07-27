<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/file/db.php";
?>

<form action="upload2_ok.php"  
   method="post" 
   enctype="multipart/form-data">
   
    <input type="file" name="upload[]">
    <input type="file" name="upload[]">
    
    <input type="submit" value="업로드">
    
</form>









