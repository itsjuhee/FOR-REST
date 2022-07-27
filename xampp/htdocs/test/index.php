<?
    echo $_GET['name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <form action="insert.php">
        <input type="text" name="name">
        <input type="text" name="tel">
        <input type="text" name="email">        
        <input type="submit" value="save">
    </form>
    
<!--
index.php (정보입력창)
insert.php (정보받고, DB접속해서 insert 쿼리명령으로 값 추가 )
-->
    
</body>
</html>








