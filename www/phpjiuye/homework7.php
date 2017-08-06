<meta charset = "utf-8"/>
<?php
	mysql_connect("localhost","root","123456") or die (mysql_error());
	$sql = "show databases";
	$result = mysql_query($sql);
	$fields = mysql_num_fields($result);
	echo "<table border = '1' rules = 'all' style = 'margin:0px auto;'>";
		echo "<tr>";
			echo "<th colspan = 2>Databas</th>";
		echo "</tr>";
	while($rec = mysql_fetch_array($result))
	{
		for($i = 0;$i < $fields;++$i)
		{
			echo "<tr>";
			echo "<td>".$rec[$i]."</td>";
			echo  "<td><a href = 'homework7_1.php?db=$rec[$i]'>查看表</a><br/></td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>