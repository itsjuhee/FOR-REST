<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

  <form 
    name="join" 
    action="request_ok.php" 
    method="get" 
    >
<!--enctype="multipart/form-data"-->
    
     <ul>
        <li>
            <input type="text" name="id" placeholder="id">
        </li>
        <li>
            <input type="password" name="pw" placeholder="pw">
        </li>
        <li>
            남<input type="radio" name="s" value="m">
            여<input type="radio" name="s" value="f">
        </li>
        <li>
            <select name="city">
                <option>서울</option>
                <option>인천</option>
            </select>
        </li>
        <li>유입경로? <br>
            검색<input type="checkbox" name="what[]" value="검색">
            지인<input type="checkbox" name="what[]" value="지인">
            광고<input type="checkbox" name="what[]" value="광고">
        </li>
        <li>
            <textarea name="content"></textarea>
        </li>
        <li>
            <input type="submit" value="가입하기">
        </li>
        
      </ul>
  </form>
   
   
   
   
    
</body>
</html>