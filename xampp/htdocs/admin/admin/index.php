<? include_once "admin_check.php" ?>


<!DOCTYPE html>
<html>
<head>
<title>Juan Admin MODE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="assets/css/admin.css" type=text/css rel=stylesheet>
    
</head>
<body>
<div class="a_wrap">
    <header>
        <h1>Admin</h1>
        <nav>
            <ul>
                <li><a href="/" target="_blank">홈페이지바로가기</a></li>
                <li><a href="admin_edit.php" target="contents">관리자 설정</a></li>
                <li>
                    제품관리 
                    <div>
                        <a href="product/code.php" target="contents">- 분류</a>
                        <a href="product/item_list.php" target="contents">- 상품관리 </a>
                    </div>
                </li>
                <li>
                    고객상담실
                    <div> 
                        <a href="#" target="_blank">- 공지사항</a>
                        <a href="#" target="contents">- A/S문의 </a>
                    </div>
                </li>
            </ul>
            <aside>
                <p><a href="admin_logout.php">로그아웃 </a></p>
            </aside>
        </nav>
    </header>
    <section>
        <iframe src="admin_edit.php" frameborder="0" name="contents" id="the_iframe" scrolling="auto" width="100%" height="1000"></iframe>
    </section>
</div>

</body>
</html>
