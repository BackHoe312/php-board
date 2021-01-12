<?php
    $connect = mysqli_connect("localhost", "root", "", "board");

    $number = $_GET['number'];
    $id = $_GET['userid'];
    $query = "delete from board where number = '$number'";
    $result = $connect->query($query);
?>

<script>
    alert("삭제되었습니다.");
    location.replace("./index.php");
</script>