<? include "admin_check.php"; ?>
<HTML>
<HEAD>
<TITLE>New Document</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="assets/css/admin.css" type=text/css rel=stylesheet>
<SCRIPT LANGUAGE="JavaScript">
<!--
function check(){
	//관리자 아이디
	if(!admin.admin_id.value){
		alert('관리자 아이디를 입력하세요.');
		admin.admin_id.focus();
		return false;
	}
	
	//관리자 암호
	if(!admin.admin_passwd.value){
		alert('관리자 암호를 입력하세요.');
		admin.admin_passwd.focus();
		return false;
	}

	ok=confirm('관리자설정을 변경하시겠습니까?');
	if(!ok){
		return false;
	}
	else{
		alert('변경하실 아이디, 암호를 다시 확인하셔서 기억해두세요.');
	}
}
//-->
</SCRIPT>
</HEAD>
<BODY topmargin=5 leftmargin=5>



<div class="locate">관리자설정</div>
<form name="admin" method="post" action="admin_edit_ok.php" onsubmit="return check()" ?>
<table class="ctgy admin_info" width="95%">
    <tr><th>관리자 정보 변경</th></tr>
    <tr>
        <td>
            <input type="text" name="id" size=25 maxlength="10"  placeholder="관리자 아이디">
            <input type="text" name="pw" size=25 maxlength=10 placeholder="관리자 패스워드">
            
            <input type="submit" name="submit" value=" 수정하기 ">
        </td>
        
    </tr>
</table>
</form>

<div class="g_txt">
    - 관리자 아이디와 암호를 변경하실 수 있습니다. 변경하시고 싶은 관리자 아이디나 관리자 암호를 입력하신 다음 수정하기 버튼을 누르십시오. -
</div>
        
        
</BODY>
</HTML>