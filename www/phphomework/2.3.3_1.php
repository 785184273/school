<?php
if(isset($_POST["button"]))
{
	$Rad=$_POST["Rad"];
	$Area=$Rad*$Rad;
	echo"正方形的面积为".$Area;
	}
	?>