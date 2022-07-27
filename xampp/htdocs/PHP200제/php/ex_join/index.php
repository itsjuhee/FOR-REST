<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/ex_join/db.php";

    $query = "select * from join_ order by num desc ";
    //내림차순 asc
    //where num = 4;
    
    $result = mysqli_query($dbConnect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <a href="request.php">가입하기</a>
    
    <article>
        <h2>회원리스트</h2>
        <table>
            <thead>
                <th>NUM</th>
                <th>ID</th>
                <th>PW</th>
                <th>SEX</th>
                <th>CITY</th>
                <th>WHAT</th>
                <th>CONTENT</th>
                <th></th>
            </thead>
            <tbody>
<?
  while( $row = mysqli_fetch_array($result) ){
?>
                <tr>
                    <td><?=$row['num']?></td>
                    <td><?=$row['id']?></td>
                    <td><?=$row['pw']?></td>
                    <td><?=$row['sex']?></td>
                    <td><?=$row['city']?></td>
                    <td><?=$row['what']?></td>
                    <td><?=$row['content']?></td>
                    <td>
    <a href="modify.php?num=<?=$row['num']?>">[수정]</a>
    <a href="delete.php?num=<?=$row['num']?>">[삭제]</a>
                    </td>
                </tr>
<? } ?>
            </tbody>
        </table>
    </article>
    
    
    
    
    
    
</body>
</html>