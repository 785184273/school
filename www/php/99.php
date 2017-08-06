<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<table>
				<?php
					for($i = 1;$i <= 9;$i++)
					{
						echo '<tr>';
						for($a = 1;$a <= $i;$a++)
						{
							echo '<td style = "border:1px solid red;">'.$i.'*'.$a.'='.$i*$a.'&nbsp;&nbsp</td>';
						}
						echo '</tr>';
					}
				?>
			</table>
		</body>
</html>
<!--
	99规则
		列乘行
-->