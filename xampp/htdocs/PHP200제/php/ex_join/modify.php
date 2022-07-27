<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/ex_join/db.php";

    $num = $_GET['num'];

    $query = "select * from join_ where num='$num'";
    $result = mysqli_query($dbConnect, $query);
    $row = mysqli_fetch_array($result);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

  <form 
    name="join" 
    action="request_ok.php" 
    method="get" 
    >
<!--enctype="multipart/form-data"-->
    
     <ul>
        <li>
            <input type="text" name="id" placeholder="id" value="<?=$row['id']?>">
        </li>
        <li>
            <input type="password" name="pw" placeholder="pw" value="<?=$row['pw']?>">
        </li>
        <li>
           
    <?
        $sex = $row['sex'];
        $sex == 'm' ? $m='checked' : $m='';
        $sex == 'f' ? $f='checked' : $f='';
    ?> 
           
    남<input type="radio" name="s" value="m" <?=$m?>>
    여<input type="radio" name="s" value="f" <?=$f?>>
       
       
       
        </li>
        <li>
            <select name="city">
    <?
        $city = ['서울','인천'];
        foreach($city as $value){
            
        $value == $row['city'] ? $sel='selected' : $sel='';
    ?> 
                <option <?=$sel?>><?=$value?></option>
    <? } ?>
            </select>
        </li>
        <li>
    
            유입경로? <br>
            검색<input type="checkbox" name="what[]" value="검색">
            지인<input type="checkbox" name="what[]" value="지인">
            광고<input type="checkbox" name="what[]" value="광고">
            
<script>
    function entry(v){
        var what = document.querySelectorAll("input[name='what[]']")
        for(var i=0;i<what.length;i++){
            if(v == what[i].value){
                what[i].checked = 'checked';
            }    
        }
    }
</script>
<?
    $what = explode('/',$row['what']); //검색/지인
    foreach($what as $value){
        echo "<script>entry(\"$value\");</script>";
    }
?>
        
        
        </li>
        <li>
            <textarea name="content">
                <?=$row['content']?>
            </textarea>
        </li>
        <li>
            <input type="submit" value="가입하기">
        </li>
        
      </ul>
      
<input type="hidden" name="mode" value="modify">
<input type="hidden" name="num" value="<?=$row['num']?>">
 
 
 
  </form>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
<script>
    var as = '', b;
    
    function bb(n){
        while(n>0){
            b = n % 3;
            n = parseInt(n / 3);
            if(b == 0){
                n -= 1;
                b = 4;
            }
            as += b; 
        }
        console.log(as);
    }
    
    bb(5);
    
    //2+4  
    
    
    
    
</script>
   
   
   
   
   
   
    
</body>
</html>