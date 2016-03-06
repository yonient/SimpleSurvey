<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        请输入需要生成的用户数：
        <input type="text" name="quantity">
        <button type="submit" name="submit">提交</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        include("conn.php");
        $quantity = $_POST['quantity'];
        $searchSql = "SELECT * FROM user ORDER BY username DESC LIMIT 0,1";
        $latestid = $mysqli->query($searchSql);
        if ($latestid->num_rows) {
            $latestid = $latestid->fetch_assoc();
            $latestid = $latestid['username'];
            $numbers = range ($latestid,($latestid+$quantity));
        } else {
            $numbers = range (100001,(100001+$quantity));
        }
        $count = 0;
        for ($i=0;$i<$quantity;$i++) {
            $insertSql = "INSERT INTO user (username, password) VALUES ('{$numbers[$i]}','123456')";
            $insert = $mysqli->query($insertSql);
            if ($insert) {
                $count++;
            }
        }
        if ($count == $quantity) {
            echo '生成成功！';
        }
    }
?>