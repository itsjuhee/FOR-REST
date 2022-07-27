<?
include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";
?>


<table class="ctgy" width="95%">
        <tr><th>대분류</th><th>중분류</th><th>소분류</th></tr>
        <tr>
            <td>
                <div class="ctgy1">
                    <?
                        $query = "select * from code1";
                        $result = mq($query);
                        while($row  = mysqli_fetch_array($result)){
                        if(isset($_GET['ct1'])){
                            if($_GET['ct1'] == $row['ct1']){
                                $active = 'active';
                            }else{
                                $active = '';
                            }
                        }else{
                            $active = '';
                        }
                    ?>
                    
                        <p class="<?=$active?>" data-num1="<?=$row['ct1']?>">
                        <? if($active == 'active'){ ?>
                            <input id="ct1" type='text' value="<?=$row['name']?>">
                        <? }else{ ?>
                            <a href="?ct1=<?=$row['ct1']?>"><input type='text' value="<?=$row['name']?>"></a>
                        <? } ?>

                       
                       <!--onclick="check()"-->
                        <span><a onclick="check('ct1','edit')">EDIT</a>
                            <a onclick="check('ct1','del')">DEL</a>
                        </span>
                    </p>
                    <? } ?>
                </div>
            </td>
            <td>
                <div class="ctgy2">
                    <!--중분류-->
                    <?
                        if(isset($_GET['ct1'])){
                    
                            $ct1 = $_GET['ct1'];
                            $query = "select * from code2 where ct1=$ct1";
                            $result = mq($query);
                            while($row  = mysqli_fetch_array($result)){
                            if(isset($_GET['ct2'])){
                                if($_GET['ct2'] == $row['ct2']){
                                    $active = 'active';
                                }else{
                                    $active = '';
                                }
                            }else{
                                $active = '';
                            }
                    ?>
                    
                            <p class="<?=$active?>" data-num2="<?=$row['ct2']?>">
                            <? if($active == 'active'){ ?>
                                <input id="ct2" type='text' value="<?=$row['name']?>">
                            <? }else{ ?>
                                <a href="?ct1=<?=$row['ct1']?>&ct2=<?=$row['ct2']?>"><input type='text' value="<?=$row['name']?>"></a>
                            <? } ?>


                           <!--onclick="check()"-->
            <span><a onclick="check('ct2','edit')">EDIT</a>
                <a onclick="check('ct2','del')">DEL</a>
            </span>
                        </p>
                    <? } } ?>    
                    <!--중분류 end-->
                </div>
            </td>
            <td>
                <div class="ctgy3">
                    <p data-num3="3">
                        <input type='text' value='분류3'>
                        <span><a class=edit href="">EDIT</a><a class=del href="">DEL</a></span>
                    </p>
                </div>
            </td>
        </tr>
    </table>