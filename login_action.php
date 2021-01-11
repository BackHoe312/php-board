<?php
    SESSION_start();

    $connect = mysqli_connect("localhost", "root", "", "board") or die("Connect Fail");

    // id와 pw 입력받기
    $id = $_GET['id'];
    $pw = $_GET['pw'];

    $query = "select * from member where id ='$id'";
    $result = $connect->query($query);

    // 아이디가 있는지 검사
    
    if(mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_assoc($result);

        // 비밀번호가 맞다면 세션을 생성
        if($row['pw'] == $pw) {
            $_SESSION['userid'] = $id;
            if(isset($_SESSION['userid'])) {

            ?> <script>
                alert("로그인 되었습니다.");
                location.replace("./index.php") // 자신의 위치를 재설정
            </script>
            <?php
            } 
            else {
                echo "session fail";
            }
        }
        else { ?>
            <script>
                alert("비밀번호가 잘못되었습니다.");
                history.back();
            </script>
            <?php
        }
    }
    else { ?>
        <script>
            alert("아이디가 잘못되었습니다.");
            history.back();
        </script>
        <?php
    }
?>