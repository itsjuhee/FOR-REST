

<ul>
<?

    $query = "select * from item";
    $result = mq($query);
    include_once "../page_var.php";
                    
    $query = "select * from item order by num desc limit $start_num,$list";
    $result = mq($query);
    while($row = mysqli_fetch_array($result)){
?>
    <li>
        
        <a href="<?=$_SERVER['PHP_SELF']?>?mode=view&num=<?=$row['num']?>">
            <img src="../file/<?=$row['p_photo']?>">
        </a>
        <code><?=$row['p_name']?></code>
    </li>
<? } ?>
</ul>


<div class="paging">
    <? include_once "../paging.php"; ?>       
</div>

<style>
    ul{
        width:90%; margin:0 auto;
        display:flex;
        justify-content: space-between;
        flex-direction: column;
    }
    li{width:30%;}
    li img{width:100%;}
</style>


