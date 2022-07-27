<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<?
    include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/admin_check.php";

$mode = $_GET['mode'];
    
if($mode == 'ct1_insert'){
    
    $query = "select * from code1 order by num desc limit 0,1";
    $result = mq($query);
    $row  = mysqli_num_rows($result);
    if($row == 0){
        $ct1 = 1;
    }else{
        $row = mysqli_fetch_array($result);
        $ct1 = ++$row['ct1'];
    }

    $ct1_name = $_GET['ctgy1_name'];
    $query = "insert into code1 (ct1,name) 
              values ('$ct1','$ct1_name')";
    mq($query);

    echo "<script>location.href='code.php';</script>";
    
    
}else if($mode == 'ct1_modify'){
    
    //update
    $ct1 = $_GET['ct1'];
    $ct1_name = $_GET['ct1_name'];
    $query = "update code1 set ct1='$ct1',name='$ct1_name' where ct1 = '$ct1'";
    mq($query);

    echo "<script>
          location.href='code.php?ct1=$ct1';</script>";
    
}else if($mode == 'ct1_delete'){
    
    $ct1 = $_GET['ct1'];
    $query = "select * from code2 where ct1 ='$ct1'";
    $result = mq($query);
    $row = mysqli_num_rows($result);
    
    function query(){
        $query = "
        delete A, B from 
        code1 A INNER JOIN code2 B  
        ON A.ct1 = '$ct1' && B.ct1 = '$ct1' 
        Where A.ct1 = '$ct1'";

        mq($query); 
    }
    
    if($row){
        echo "<script>
                var cfm = confirm('중분류에 카테고리가 존재합니다. 함께 삭제할까요?');
                if(cfm){  
                    
                    $.ajax({
                        url : 'delete.php',
                        type : 'get',
                        data : {
                            ct1: '$ct1'
                        }
                    });//ajax end
                }else{
                    history.back();
                }
              </script>";

    }else{
        $query = "delete from code1 where ct1 ='$ct1'";
        mq($query);
    }
    
    echo "<script>location.href='code.php';</script>";
        
    
    
}else if($mode == 'ct2_insert'){
    
    $query = "select * from code2 order by num desc limit 0,1";
    $result = mq($query);
    $row  = mysqli_num_rows($result);
    if($row == 0){
        $ct2 = 1;
    }else{
        $row = mysqli_fetch_array($result);
        $ct2 = ++$row['ct2'];
    }
    $ct1 = $_GET['ct1'];
    $ct2_name = $_GET['ctgy2_name'];
    $query = "insert into code2 (ct1,ct2,name) 
              values ('$ct1','$ct2','$ct2_name')";
    mq($query);

    echo "<script>location.href='code.php';</script>";
    
}else if($mode == 'ct2_modify'){
    
    //update
    $ct1 = $_GET['ct1'];
    $ct2 = $_GET['ct2'];
    
    $ct2_name = $_GET['ct2_name'];
    $query = "update code2 set name='$ct2_name' where 
    ct1 = '$ct1' && ct2 = '$ct2'";
    mq($query);

    echo "<script>location.href='code.php?ct1=$ct1&ct2=$ct2';</script>";
    
}else if($mode == 'ct2_delete'){
    $ct1 = $_GET['ct1'];
    $ct2 = $_GET['ct2'];
    $query = "delete from code2 where ct1 ='$ct1' && ct2 ='$ct2'";
    mq($query);
}


?>









