<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Survey Test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/addtosql.js"></script>
</head>

<body>
    <div class="container">
        <?php
			session_start();
			if (!$_SESSION['id'] || empty($_GET['id'])) {
				header("location: select.php");
                exit;
			}
            include("include/conn.php");
            $getPaperSql = "SELECT * FROM question WHERE question_paper = {$_GET['id']}";
            $getTotalQuestion = "SELECT COUNT(id) FROM question WHERE question_paper = {$_GET['id']}";
            $totalQuestion = $mysqli->query($getTotalQuestion)->fetch_assoc();
            $totalQuestion = $totalQuestion['COUNT(id)'];
			$submittedQuestionSql = "SELECT COUNT(id) FROM result WHERE result_paper = {$_GET['id']} AND result_userid = {$_SESSION['id']}";
			$submittedQuestion = $mysqli->query($submittedQuestionSql)->fetch_assoc();
			$submittedQuestion = $submittedQuestion['COUNT(id)'];
            $getPaper = $mysqli->query($getPaperSql);
            if ($getPaper->num_rows) {
				if($submittedQuestion == $totalQuestion){
					while ($question = $getPaper->fetch_assoc()) {
						$getOptionSql = "SELECT * FROM `option` WHERE option_question = {$question['id']}";
						echo "<div id=\"{$question['id']}\">";
						echo $question['id']. '.'. $question['question_name']. '<br>';
						$getOption = $mysqli->query($getOptionSql);
						while ($option = $getOption->fetch_assoc()) {
							$checkIfSelected = "SELECT * FROM result WHERE result_userid = {$_SESSION['id']} AND result_question = {$question['id']}";
							$ifSelected = $mysqli->query($checkIfSelected);
							if($ifSelected->num_rows){
								$selected = $ifSelected->fetch_assoc();
								if($option['option_name'] == $selected['result_option']){
									echo "<label><input type=\"radio\" name=\"{$question['id']}\" value=\"{$option['option_name']}\" checked=\"checked\">{$option['option_name']}.{$option['option_description']}</label> ";
								} else {
									echo "<label><input type=\"radio\" disabled name=\"{$question['id']}\" value=\"{$option['option_name']}\">{$option['option_name']}.{$option['option_description']}</label> ";
								}
							} else {
								echo "<label><input type=\"radio\" disabled name=\"{$question['id']}\" value=\"{$option['option_name']}\">{$option['option_name']}.{$option['option_description']}</label> ";
							}
						}
						echo "</div>";
						echo "<br><br>";
					}
					echo "<input type=\"button\" disabled value=\"您已提交\">";
					echo "<a href=\"select.php\">点击返回主页";
				} else {
					while ($question = $getPaper->fetch_assoc()) {
						$getOptionSql = "SELECT * FROM `option` WHERE option_question = {$question['id']}";
						echo "<div id=\"{$question['id']}\">";
						echo $question['id']. '.'. $question['question_name']. '<br>';
						$getOption = $mysqli->query($getOptionSql);
						while ($option = $getOption->fetch_assoc()) {
							$checkIfSelected = "SELECT * FROM result WHERE result_userid = {$_SESSION['id']} AND result_question = {$question['id']}";
							$ifSelected = $mysqli->query($checkIfSelected);
							if($ifSelected->num_rows){
								$selected = $ifSelected->fetch_assoc();
								if($option['option_name'] == $selected['result_option']){
									echo "<label><input type=\"radio\" name=\"{$question['id']}\" value=\"{$option['option_name']}\" checked=\"checked\">{$option['option_name']}.{$option['option_description']}</label> ";
								} else {
									echo "<label><input type=\"radio\" name=\"{$question['id']}\" value=\"{$option['option_name']}\">{$option['option_name']}.{$option['option_description']}</label> ";
								}
							} else {
								echo "<label><input type=\"radio\" name=\"{$question['id']}\" value=\"{$option['option_name']}\">{$option['option_name']}.{$option['option_description']}</label> ";
							}
						}
						echo "</div>";
						echo "<br><br>";
					}
					echo "<input type=\"button\" onclick=\"submit({$totalQuestion})\" value=\"提交\">";
				}
            } else {
                header("location: select.php");
                exit;
            }
        ?>
    </div>
</body>
</html>