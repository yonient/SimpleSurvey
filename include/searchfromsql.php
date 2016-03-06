<?php
    include("conn.php");
    session_start();
    $searchSql = "SELECT question_id, result_option FROM result WHERE result_userid = {$_SESSION['id']}";
    $search = $mysqli->query($searchSql);
    while($result = $search->fetch_assoc()){
        $array[$result['question_id']] = $result['result_option'];
    }
    echo json_encode($array);