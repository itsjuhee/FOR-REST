<!doctype html>
<HTML>
<HEAD>
<TITLE>New Document</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="assets/css/admin.css" type=text/css rel=stylesheet>
    
<SCRIPT LANGUAGE="JavaScript">
<!--
function check(){
	//관리자 아이디
	if(!admin.id.value){
		alert('관리자 아이디를 입력하세요.');
		admin.id.focus();
		return false;
	}
	
	//관리자 암호
	if(!admin.pw.value){
		alert('관리자 암호를 입력하세요.');
		admin.pw.focus();
		return false;
	}
}
//-->
</SCRIPT>
</HEAD>
<BODY>


<div class="wh_cnt">
    <form name="admin" method="post" action="admin_login_ok.php" onsubmit="return check()" >
    <table class="ctgy admin_info" width="500">
        <tr><th>관리자 로그인</th></tr>
        <tr>
            <td>
                <input type="text" name="id" size=25 maxlength="10"  placeholder="관리자 아이디">
                <input type="text" name="pw" size=25 maxlength=10 placeholder="관리자 패스워드">

                <input type="submit" name="submit" value=" 로그인 ">
            </td>

        </tr>
    </table>
    </form>
</div>
    
</BODY>
</HTML>