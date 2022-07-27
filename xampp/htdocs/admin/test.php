<script type="text/javascript">
    function run() {
        alert("hello world");
    }

    <?="run();"?>
</script>

<? 
    $str="here!"; 
    function getfile(){ 
        global $str; return $str; 
    } 
?>

<script language="javascript">
    function getfile() {
        var aa = document.getElementById('aa');
        aa.innerHTML = "<?=getfile();?>";
    }
</script>

<div id="aa"></div>
<input type="button" value="click me" onclick="getfile()">

