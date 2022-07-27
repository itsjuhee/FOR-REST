<?
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root."/PHP200제/php/ex_join/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="editer/js/HuskyEZCreator.js" charset="utf-8"></script>
</head>
<body>

<form action="request.php">
    <textarea id="ir1"></textarea>
    <input type="submit" value="확인">
</form>  
  
<script type="text/javascript">
    var oEditors = [];
    nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "ir1",
        sSkinURI: "editer/SmartEditor2Skin.html",	
        htParams : {bUseToolbar : true,
            fOnBeforeUnload : function(){
                //alert("아싸!");	
            }
        }, //boolean
        fOnAppLoad : function(){
            //예제 코드
            //oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
        },
        fCreator: "createSEditor2"
    });
</script>
   
   
    
    
    
</body>
</html>