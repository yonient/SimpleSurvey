<meta charset="UTF-8">
<form method="post">
	请指定一个试卷名：<br>
	<input type="text" name="papername"><br>
	试卷描述：<br>
	<input type="text" name="paperdes">
	<button type="submit" name="submit">提交</button>
</form>
<?php
	if (isset($_POST['submit'])) {
		//引入 PHPExcel 类以及数据库连接文件
		include("include/conn.php");
		include("include/Classes/PHPExcel.php");

		$objExcel = new PHPExcel_Reader_Excel2007();   // 新建 2007 以上 Excel 读取对象

		if (!$objExcel->canRead("excel/import.xlsx")) {
			echo '错误！';
			exit;
		} else {
			$papername = $_POST['papername'];
			$paperdes = $_POST['paperdes'];
			$excel = $objExcel->load("excel/import.xlsx"); // 指定读取文件名
			$sheet = $excel->getSheet(0);   // 选定第一张表
			$highestRow = $sheet->getHighestRow();       // 读取全部行数
			$highestColumn = $sheet->getHighestColumn(); // 读取全部列数
			$totalColumn = ord($highestColumn) - ord('A'); // 获取全部列数的数字
			
			$addPaperSql = "INSERT INTO paper (paper_name, paper_description) VALUES ('$papername', '$paperdes')";
			$addPaper = $mysqli->query($addPaperSql);
			$addedPaperId = $mysqli->insert_id;

			for($row = 2; $row <= $highestRow; $row++){ //从第 2 行开始读取行
				for ($column = 'A'; $column <= $highestColumn; $column++) { // 从 A 列开始读取非空的列
					$dataset[] = $sheet->getCell($column.$row)->getValue();
				}
				$addQuestionSql = "INSERT INTO question (question_name, question_type, question_paper) VALUES ('{$dataset[1]}', 1, $addedPaperId)";
				$addQuestion = $mysqli->query($addQuestionSql);
				$addedQuestionId = $mysqli->insert_id;
				$count = 'A';
				for($i = 5; $i <= $totalColumn; $i++){
					$addOptionSql = "INSERT INTO `option` (option_name, option_description, option_question) VALUES ('$count', '{$dataset[$i]}', $addedQuestionId)";
					$addOption = $mysqli->query($addOptionSql);
					$count++;
				}
				unset($dataset);
			}
			
			echo '导入成功';
		}
	}