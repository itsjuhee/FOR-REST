<?
    include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";
 
    if($_SESSION['id'] != 'admin'){
        echo "<script>
            alert('관리자 로그인 후 이용하세요.');
            location.href='/study/admin/admin_login.php';
            </script>";
    }

?>
