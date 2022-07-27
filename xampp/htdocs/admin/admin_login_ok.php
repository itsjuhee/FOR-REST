<?
    include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    
    $query = "select * from admin where id='$id' and pw='$pw'";
    $result = mq($query);
    $row = mysqli_num_rows($result);

    if($row){
        $_SESSION['id'] = 'admin';
        $_SESSION['name'] = '최고관리자';
        echo "<script>
                location.href='index.php';
              </script>";
    }else{
        echo "<script>
                alert('관리자 정보가 잘못되었습니다.');
                history.back();
              </script>";
    }



?>