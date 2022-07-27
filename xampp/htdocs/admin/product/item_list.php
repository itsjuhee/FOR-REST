<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>New Document</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../assets/css/admin.css" type=text/css rel=stylesheet>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</HEAD>
<BODY>


<div class="locate">상품관리 > 제품리스트</div>

    <form name="product" method='post' enctype="multipart/form-data">
        
    <? include_once "ctgy.php"; ?>
    
    
    <article class="p_List">
        <h2>제품 리스트</h2>
        <div>
            <?
                $query = "select count(num) as total from item";
                $result = mq($query);
                $row = mysqli_fetch_array($result);
            
                if(isset($_GET['ct1']) && !isset($_GET['ct2'])){
                    $query = "select count(num) as total from item where ct1=$_GET[ct1]";
                    
                }else if(isset($_GET['ct2'])){
                    $query = "select count(num) as total from item where ct1=$_GET[ct1] && ct2=$_GET[ct2]";
                }
                $result = mq($query);
                $ct_row = mysqli_fetch_array($result);
            ?>
            <p class="result">
                총게시물:<?=$row['total']?> / 
                검색: <?=$ct_row['total']?>
            </p>
            <table>
                <thead>
                    <tr>
                        <th>번호</th>
                        <th colspan="2">제품명</th>
                        <th>공개여부</th>
                        <th>수정/삭제</th>
                    </tr>
                </thead>
                <tbody>
<?
    $query = "select * from item";
    $result = mq($query);
    include_once "../page_var.php";
                    
    $query = "select * from item order by num desc limit $start_num,$list";
    $result = mq($query);
    while($row = mysqli_fetch_array($result)){
?>
                    <tr>
                        <td><?=$row['num']?></td>
                        <td>
                            <p><a href="" target="_blank">
                                <img src="../file/<?=$row['p_photo']?>"></a>
                            </p>
                        </td>
                        <td>
                            <code><?=$row['p_name']?></code>
                            <code><?=$row['p_info']?></code>
                        </td>
                        <td><i><?=$row['public']?></i></td>
                        <td>
        <a href="item_modify.php?num=<?=$row['num']?>&ct1=<?=$row['ct1']?>&ct2=<?=$row['ct2']?>">수정</a>
                            
                            
        <a href="itemReg.php?mode=delete&num=<?=$row['num']?>">삭제</a>
                        </td>
                    </tr>
                    <?}?>
                </tbody>
            </table>
            <div class="paging">
                <? include_once "../paging.php"; ?>       
            </div>
        </div>
        
    </article>
    
    <a href="item.php">상품등록</a>
    
</form>

    
               
				
</BODY>
</HTML>