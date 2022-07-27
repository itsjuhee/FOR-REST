<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    $sql = "SELECT regTime FROM realtimekeyword";
    $result = $dbConnect->query($sql);

    $count = $result->num_rows;

    //검색 가능한 날짜 수집
    $dateList = array();

    for($i = 0; $i < $count; $i++){
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $date = date('Y-m-d', $data['regTime']);
        array_push($dateList, $date);
    }

    //array_unique는 배열의 중복값을 없애는 함수
    $dateList = array_unique($dateList);
?>
<!doctype html>
<html>
<head>
<title>실시간 검색어 리스트 선택 폼</title>
</head>
<body>
<h1>포털 사이트와 날짜를 선택하세요.</h1>
<form name="realtimekeyword" method="post" action="200-2-view.php">
    <select name="media" required>
        <option value="naver">네이버</option>
        <option value="daum">다음</option>
    </select>

    <select name="date" required>
<?php
    foreach($dateList as $dl){
?>
        <option value="<?=$dl?>"><?=$dl?></option>
<?php
    }
?>
    </select>
    <input type="submit" value="검색어 보기" />
</form>
</body>
</html>