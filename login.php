<meta charset="utf-8">
<?php
    include("include/conn.php");
    session_start();

    if(isset($_POST['submit'])){
        $usr = $_POST['username'];
        $pw = $_POST['password'];

        $searchUserSql = "SELECT * FROM user WHERE username='$usr' AND password='$pw'";
        $searchUser = $mysqli->query($searchUserSql);
        if($searchUser->num_rows){
            $user = $searchUser->fetch_assoc();
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            echo "<script>window.location.href=\"paper.php\";</script>";
        } else {
            echo '<script>alert("用户名或密码错误！")</script>';
			echo "<script>window.location.href=\"index.php\";</script>";
        }
    }
?>