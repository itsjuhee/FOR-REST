<?
    include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    
    $query = "update admin set id='$id', pw='$pw' where id='$id'";
    $result = mq($query);
   
    echo "<script>
            alert('정상 처리 되었습니다.');
            location.href = 'admin_edit.php';
          </script>";




?>