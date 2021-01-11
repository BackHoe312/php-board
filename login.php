<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align=center>
        <span>로그인</span>

        <form method='get' action='login_action.php'>
            <p>ID:<input name="id" type="text"></p>
            <p>PW:<input name="pw" type="text"></p>
            <input type="submit" value="로그인">
        </form>
        <br>
        <button id="join" onclick="location.href='./join.php'">회원가입</button>
    </div>
</body>
</html>