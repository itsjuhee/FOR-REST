<?
include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";

$mode = $_GET['mode'];

if($mode == 'modify' || $mode == 'insert'){
    $ct1 = $_POST['ct1'];
    $ct2 = $_POST['ct2'];
    $name = $_POST['p_name'];
    $info = $_POST['p_info'];
    $detail = $_POST['p_detail'];

    if(isset($_POST['public'])){
        $public = '공개';
    }else{
        $public = '비공개';
    }

    $upload = '../file/';
    $photo = $_FILES['p_photo']['name'];
    $temp = $_FILES['p_photo']['tmp_name'];
}

if($mode=='insert'){
    move_uploaded_file($temp,$upload.$photo);
    $query = "insert into item (                                         ct1,ct2,p_name,p_info,p_photo,p_detail,public) 
              values (          '$ct1','$ct2','$name','$info','$photo','$detail','$public')";

    mq($query);

    echo "<script>location.href='item.php';</script>";
    
}else if($mode=='modify'){
    if(!empty($photo)){
        $query = "select * from item where ct1='$ct1' && ct2 ='$ct2'";
        $result = mq($query);
        $row = mysqli_fetch_array($result);
        $imgName = "../file/".$row['p_photo'];
        unlink($imgName);
        
        move_uploaded_file($temp,$upload.$photo);
        $query = "update item set p_photo='$photo' 
                  where ct1='$ct1' && ct2 ='$ct2'";
        mq($query);
    }
    
    $num = $_GET['num'];
    $query = "update item set 
                ct1='$ct1',ct2='$ct2',p_name='$name',
                p_info='$info',p_detail='$detail',
                public='$public'
                where num='$num'";
    mq($query); 
    
    echo "<script>location.href='item_list.php';</script>";
    
    
}else{
    $num = $_GET['num'];
    $query = "delete from item where num='$num'";
    mq($query);
    
    echo "<script>location.href='item_list.php';</script>";
}








?>
