<?php
	header('Content-Type:text/html;charset=utf-8');	
	$arr = array(
				array("01","傻逼","计算机"),
				array("02","痴线","土木工程"),
				array("03","魔法少女","滚犊子")
				);
	echo "<table border = '1' rules = 'all' align = 'center'>";
	for($a = 0;$a < 3;$a++)
	{
		echo "<tr>";
			echo "<td>".$arr[$a][0]."</td>";
			echo "<td>".$arr[$a][1]."</td>";
			echo "<td>".$arr[$a][2]."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
<?php
	header('Content-Type:text/html;charset=utf-8');	
	$arr = array(
				array("01","傻逼","计算机"),
				array("02","痴线","土木工程"),
				array("03","魔法少女","滚犊子")
				);
	echo "<table border = '1' rules = 'all' align = 'center'>";
	while(list($key,$value) = each($arr))
	{
		list($xh,$xm,$zy) = $value;
		echo "<tr>";
			echo "<td>".$xh."</td>";
			echo "<td>".$xm."</td>";
			echo "<td>".$zy."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>