<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				echo "<form method = \"POST\" action = \" \" align = 'center'>";
					for($i = 1;$i <= 5;$i++)
					{
						echo "学生".$i."的成绩：<input type = \"text\" name = \"stu[]\"/><br/>";
					}
				echo "<input type = 'submit' name = 'tijiao' value = '提交'/>";
				echo "</form>";
				if(!empty($_POST))
				{
					$stu = $_POST['stu'];
					$sum = 0;
					echo "五位同学的成绩分别是:<br/>";
					foreach($stu as $st)
					{
						echo $st."<br>";
					}
					echo '不及格的分数:</br>';
					$num = count($stu);
					for($a = 0;$a < $num;$a++)
					{
						$sum = $sum + $stu[$a];
						if($stu[$a] < 60)
						{
							echo $stu[$a]."</br>";
						}
					}
					echo "平均分为:</br>".$sum/$num;
					
				}
			?>
		</body>
</html>