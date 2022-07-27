<?
include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/assets/inc/dbcon.php";
include_once $_SERVER['DOCUMENT_ROOT']."/study/admin/admin_check.php";
?>


<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>New Document</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../assets/css/admin.css" type=text/css rel=stylesheet>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</HEAD>
<BODY>


<div class="locate">상품관리 > 분류관리</div>

    <? include_once "ctgy.php"; ?> 
   
    <div class="g_txt">
        - 해당 분류를 선택하면 수정 또는 삭제가 가능합니다. -
    </div>
    
    <article class="edit_ctgy">
        <h2>분류등록</h2>
        <div>
            
            <form name="code" action="codeReg.php" method="get">
                <span>
                    <input type="text" name="ctgy1_name" size="40" maxlength="40" placeholder="대분류">
                    <input type="hidden" name="mode" value="ct1_insert">
                    <input type="submit" value ="등록">
                </span>
            </form>
            <form name="code" action="codeReg.php" method="get">
                <span>
                    <input type="text" name="ctgy2_name" size="40" maxlength="40" placeholder="중분류">
                    <input type="hidden" name="ct1" value="<?=$_GET['ct1']?>">
                    <input type="hidden" name="mode" value="ct2_insert">
                    <input type="submit" value ="등록">
                </span>
            </form>
            <form name="code" action="code_ok.php" method="get">
                <span>
                    <input type="text" name="ctgy3_name" size="40" maxlength="40" placeholder="소분류">
                    <input type="submit" value ="등록">
                </span>
            </form>            
        </div>
    </article>
    <div class="g_txt">
        - 대분류을 등록하고 등록된 대분류를 선택하시면 중분류 & 소분류를 등록하실 수 있습니다. -
    </div>

    
				
		                   
<script>
    function check(type,mode){
        
        var ct = document.querySelectorAll('.active');
        var ct1=null, ct2=null, ct3=null;
        
        for(var i=0;i<ct.length;i++){
            if(ct[i].getAttribute('data-num1')){
                ct1 = ct[i].getAttribute('data-num1');
                
            }else if(ct[i].getAttribute('data-num2')){
                ct2 = ct[i].getAttribute('data-num2');
            }else{
                ct3 = ct[i].getAttribute('data-num3');
            }
        }

       
        
        if(mode=='edit'){
            if(type == 'ct1'){
                var ct1_name = document.getElementById('ct1');           
                location.href="codeReg.php?ct1_name="+ ct1_name.value+'&ct1='+ct1+'&mode=ct1_modify';
                
            }else if(type == 'ct2'){
                var ct2_name = document.getElementById('ct2');     
                
                location.href="codeReg.php?ct2_name="+ ct2_name.value+'&ct1='+ct1+'&ct2='+ct2+'&mode=ct2_modify';
                
            }
            else{
                var ct3_name = document.getElementById('ct3');           
                location.href="codeReg.php?ct3_name="+ ct3_name.value+'&ct3='+ct3+'&mode=ct3_modify';
            }

            /*ct1 => ct2*/
        }else{
            //delete
            if(type == 'ct1'){
                
                location.href="codeReg.php?&ct1="+ct1+"&mode=ct1_delete";
                
            }else if(type == 'ct2'){
                
                location.href="codeReg.php?&ct1="+ct1+"&ct2="+ct2+"&mode=ct2_delete";
                
            }else{
                
            }
            
        }
        
    }
/*   
$(function(){
        
    $('.evnt').click(function(){
        //start
       var $ct1_name = document.getElementById('ct1').value;
       var $ct1 = document.querySelector('.active').getAttribute('data-num');
        
        $.ajax({
            url : 'data.php',
            type : 'post',
            data : {
                ct1_name: $ct1_name,
                ct1: $ct1
            },
            success : function(data){
                alert(data);
            }
        });//ajax end
        
    });//click end
        
});//document end*/
</script>		
               
				
</BODY>
</HTML>