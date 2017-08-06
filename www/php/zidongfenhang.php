<html>
	<head>
	</head>
		<body>
			<table>
				<tr>
					<?php
						for($i =1;$i <= 100;i++)
						{
							echo '<td><img scr = /'.$i.'jpg></td>'
							if($i%10 == 0)
							{
								echo '</tr><tr>';
							}
						}
					?>
				</tr>
			</table>
		</body>
</html>