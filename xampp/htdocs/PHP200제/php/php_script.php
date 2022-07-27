<script type="text/javascript">
    function run() {
        alert("hello world");
    }
</script>

<? 
    $str=10; 
    echo $str;  //10
    
    function getfile(){ 
        global $str; 
        $str += 20;
        echo $str; //30

        //return $str; 
    } 
    echo "<script>run();</script>";
    
?>

<script language="javascript">
    function getfile() {
        var aa = document.getElementById('aa');
        aa.innerHTML = "<?=getfile();?>";
    }
</script>

<div id="aa"></div>
<input type="button" value="click me" onclick="getfile()">











