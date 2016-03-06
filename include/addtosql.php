<?php
    include("conn.php");
    session_start();

    $question = $_POST['question'];
    $option = $_POST['option'];
	$paper = $_POST['paper'];
    $searchSql = "SELECT * FROM result WHERE result_question = $question AND result_userid = {$_SESSION['id']}";
    if($mysqli->query($searchSql)->num_rows)
        $addSql = "UPDATE result SET result_option = '$option' WHERE result_question = $question AND result_userid = {$_SESSION['id']} AND result_paper = $paper";
    else
        $addSql = "INSERT INTO result (result_question, result_option, result_userid, result_paper) VALUES ($question, '$option', {$_SESSION['id']}, $paper)";
    $addresult = $mysqli->query($addSql);