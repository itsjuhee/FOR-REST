
<?
    
    $num = $_GET['num'];

    $query = "select * from item where num='$num'";
    $result = mq($query);
    $row = mysqli_fetch_array($result);
?>
    <img src="../file/<?=$row['p_photo']?>">
        
    <p><?=$row['p_name']?></p>
    <p><?=$row['p_info']?></p>
    <p><?=nl2br($row['p_detail'])?></p>


