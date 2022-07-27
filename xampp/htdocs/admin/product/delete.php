<?
include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";

$ct1 = $_GET['ct1'];

$query = "
delete A, B from 
code1 A INNER JOIN code2 B  
ON A.ct1 = '$ct1' && B.ct1 = '$ct1' 
Where A.ct1 = '$ct1'";

mq($query); 

echo '삭제 완료';

?>




