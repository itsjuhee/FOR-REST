
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>New Document</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../assets/css/admin.css" type=text/css rel=stylesheet>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../editer/js/HuskyEZCreator.js"></script>

</HEAD>
<BODY>

<div class="locate">상품관리 > 제품등록</div>

    <form name="product" method='post' enctype="multipart/form-data">
    
    <? include_once "ctgy.php"; ?>
    <style>
        .ctgy span a{display:none;}
    </style>
  
    <article class="p_addList">
        <h2>요약정보</h2>
        <div>
            <table>
            <caption></caption>
            <tr>
                <th>제품명</th><td colspan="3"><input type="text" name="p_name"></td>
            </tr>
            <tr>                
                <th>요약정보</th>
                <td colspan="3">
                    <textarea name="p_info"></textarea>
                    <i>등록하는 상품에 대한 정보를 짧게 요약하여 입력합니다.</i>
                </td>
            </tr>
            <tr>                
                <th>대표이미지</th>
                <td colspan="3">
                    <span><img  id="img_prv"></span>
                    <i>- 사이트에 기본으로 보여지는 상품이미지를 등록합니다.
                    - 대표이미지 등록 시, 상세, 목록 축소 이미지에 자동 리사이징 되어 들어갑니다.
                    - 권장이미지 : 330px * 360px / 5M 이하 / gif,png,jpg(jpeg)
                    </i>
                    <p><input type="file" name="p_photo" id="upload"> </p>
                    
                    <script>
                        document.getElementById("upload").onchange = function() {
                            document.getElementById("img_prv").style.display = 'block';
                            var reader = new FileReader();
                            reader.addEventListener('load', function(e) {
                                document.getElementById("img_prv").src = e.target.result;
                            });
                            reader.readAsDataURL(this.files[0]);
                        };
                    </script>
                    
                </td>
            </tr>
            </table>
        </div>
        <div class="g_txt">
            - 상품기본정보 쌍따옴표("), 홑따옴표('), 특수문자(|) 사용이 금지되어 있습니다 -
        </div>
        <h2>상세설명</h2>
        <div class="smediter">
            <textarea name="p_detail" id="p_detail"></textarea>
            
            <script type="text/javascript">
            var oEditors = [];
            nhn.husky.EZCreator.createInIFrame({
                oAppRef: oEditors,
                elPlaceHolder: "p_detail",
                sSkinURI: "../editer/SmartEditor2Skin.html",
                fCreator: "createSEditor2"
            });
            function submitContents(elClickedObj) {
                // 에디터의 내용이 textarea에 적용됩니다.
                oEditors.getById["p_detail"].exec("UPDATE_CONTENTS_FIELD", []);
                // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
                    
                try {
                    if(0){
               
                       return false;
                    }

product.action = 'itemReg.php?mode=insert';

                    elClickedObj.form.submit();
                } catch(e) {}
            }
                
            function showHTML() {
                var sHTML = oEditors.getById["p_detail"].getIR();
                alert(sHTML);
            }
                
            </script>
        </div>
        <div class="g_txt">
            <input type="checkbox" name="public" checked> 작성하신 제품을 사이트에 바로 공개 하시겠습니까?
        </div>
        
        <div class="btn">
            <input type="button" value="등록하기" onclick="submitContents(this)">
        </div>
        
    </article>
    
    <input type="hidden" name="ct1" value="<?=$_GET['ct1']?>">
    <input type="hidden" name="ct2" value="<?=$_GET['ct2']?>">
    

</form>
    
    <script>
       
    </script>
    
    
    
    
    
    
				
               
				
</BODY>
</HTML>