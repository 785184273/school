<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				$arr = array("E_ERROR","E_WARNING","E_PARSE","E_NOTICE","E_CORE_ERROR","E_CORE_WARNING","E_COMPILE_ERROR","E_COMPILE_WARNING","E_USER_ERROR","E_USER_WARNING","E_USER_NOTICE","E_STRICT","E_ALL");
				echo "<table border = 1 align = center>";
					echo "<tr>";
						echo "<td>错误代号（常量）</td>";
						echo "<td>十进制值</td>";
						echo "<td>二进制值</td>";
					echo "</tr>";
				function change($c)
				{
					$s = decbin($c);
					$b  = str_pad($s,16,0,STR_PAD_LEFT);
					$replace = "<font color = 'red'>1</font>";
					$d = str_replace(1,$replace,$b);
					return $d;
				}
				for($a = 0;$a < count($arr);++$a)
				{
					echo "<tr>";
						echo "<td>".$arr[$a]."</td>";
						echo "<td>".constant($arr[$a])."</td>";
						echo "<td>".change(constant($arr[$a]))."</d>";
					echo "</tr>";
				}
				echo "</table>";
			?>
			<!--素数的概念是：只能被1和它本身整除--在大于1的范围内找
				思想：素数只能2个数取模为0；
			-->
			<form method = "POST" action = "">
				<input type = "text" name = "num"/>
				<input type = "submit" name = "button" value = "确定"/>
			</form>
			<?php
				if(!empty($_POST['num']))
				{
					$c = 0;
					$num = $_POST['num'];
					if(is_numeric($num))
					{
						$num = $num + 0;
						if(is_int($num))
						{
							for($i = 1;$i <= $num;++$i)
							{
								if($num % $i == 0)
								{
									$c++;
								}
							}
							if($c == 2)
							{
								echo $num."是素数";
							}else
							{
								echo $num."不是素数";
							}
						}else
						{
							echo "<script>window.alert('请输入一个整数!')</script>";
						}
					}else
					{
						echo "<script>window.alert('请输入一个数字!')</script>";
					}
				}
			?>
		</body>
</html>