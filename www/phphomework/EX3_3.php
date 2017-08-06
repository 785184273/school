<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
<?php
	define('PI',3.1415926);
	$C_area = PI*10*10;
	$T_area = (20+30)*10/2;
	if($C_area > 50&&$T_area > 50)
	{
		echo "圆的面积为：".$C_area."</br>";
		echo "梯形的面积为：".$T_area."</br>";
	}
?>
</html>