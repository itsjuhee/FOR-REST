<style>
        ul{text-align:center;}
        li{display:inline-block;}
        .active{color:#f00;}
    </style>
    <ul>
        <li>
            <a href="?page=1">처음</a>
        </li>
        <li>
        <? $pre = $page-1; 
            if($page > 1){
                echo "<a href='?page=$pre'>이전</a>";
            }
        ?>
        </li>
        <li>
        <?
        for($i=$block_start; $i<=$block_end; $i++){
            if($page == $i){
                echo "<a class='active'>$i</a>";
            }else{
                echo "<a href='?page=$i'>$i</a>";
            }
        }
        ?>
            
        </li>
        <li>
        <? $next = $page+1; 
            if($page < $total_page){
                echo "<a href='?page=$next'>다음</a>";
            }
        ?>
        </li>
        <li><a href="?page=<?=$total_page?>">마지막</a></li>
    </ul>