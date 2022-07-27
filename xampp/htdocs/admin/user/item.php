

<? include_once "header.php";?>

<div id="section">
    <?
        if(isset($_GET['mode'])){
            include_once "view.php";
        }else{
            include_once "list.php";
        }
    ?>
</div>

<? include_once "footer.php";?>
    
    