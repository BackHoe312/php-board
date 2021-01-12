<!DOCTYPE html>
<head>
    <title>Document</title>
</head>
<style>
    <style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>
</style>
<body>
    <?php
        $connect = mysqli_connect('localhost', 'root', '', 'board') or die ("Connect fail");
        $query = "select * from board order by number desc";
        $result = $connect->query($query);
        $total = mysqli_num_rows($result);

        session_start();

        if(isset($_SESSION['userid'])) {
            echo $_SESSION['userid']; ?> 님 안녕하세요
            <br/>
            <button onclick="location.href='./logout.php'">로그아웃</button>
            <?php
        }
            else {
            ?>    <button onclick="location.href='./login.php'">로그인</button>
                <br>
            <?php
            }
    ?>
    <h2 align=center>게시판</h2>
    <table align=center>
            <thead align=center>
                <tr>
                    <td width="50">번호</td>
                    <td width="500">제목</td>
                    <td width="100">작성자</td>
                    <td width="200">날짜</td>
                    <td width="50">조회수</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)) {
                        if($total%2==0) {
                ?>      <tr class="even">
                <?php   }
                        else { ?>
                            <tr>
                <?php   } ?>
                                <td width="50"><?php echo $total?></td>
                                <td width="500"><a href="view.php?number=<?php echo $rows['number']?>"><?php echo $rows['title']?></a></td>
                                <td width="100"><?php echo $rows['id']?></td>
                                <td width="200"><?php echo $rows['date']?></td>
                                <td width="50"><?php echo $rows['hit']?></td>
                            </tr>
                    <?php
                        $total--;
                    } ?>
            </tbody>
    </table>
    <div class="text">
        <font style="cursor:hand" onclick="location.href='./write.php'">글쓰기</font>
    </div>
</body>
</html>