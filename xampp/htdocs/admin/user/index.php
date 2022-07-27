

<? include_once "header.php";?>

<div id="section">
    <? include_once "main.php";?>
</div>

<aside>
    <?
        /*echo $_SESSION['id'];*/
        setcookie("cookie1",'BASDFAA',time()+10000);
    
        $currdt = date('Y-m-d H:i:s');
        $userIP = $_SERVER['REMOTE_ADDR'];
    
        if(!isset($_SESSION['id'])){
            $query = "insert into visit (date,ip) values ('$currdt','$userIP')";
            $result =mq($query);
        }
    
        $query = "select count(*) as count from visit where DATE(date) = DATE('$currdt')";
        $result =mq($query);
        $row = mysqli_fetch_array($result);
    
    
        $query = "select count(*) as count from visit ";
        $result =mq($query);
        $total = mysqli_fetch_array($result);
    
    ?>
    
    <p>오늘방문자 : <?=$row['count']?> </p>
    
    <p>전체방문자 : <?=$total['count']?></p>
</aside>



<? include_once "footer.php";?>
    
    