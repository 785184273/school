<?php
	if(!empty($_GET['db']))
	{
		$dbname = $_GET['db'];
	}
	mysql_connect("localhost","root","123456") or die (mysql_error());
	mysql_query("use $dbname");
	$sql = "show tables";
	$result = mysql_query($sql);
	$fields_count = mysql_num_fields($result);
	echo "<table border = '1' rules = 'all' style = 'margin:0px auto;'>";
		echo "<tr>";
			for($j = 0;$j < $fields_count;++$j)
			{
				$field = mysql_field_name($result,$j);
				echo "<th>".$field."</th>";
			}
		echo "</tr>";
	while($rec = mysql_fetch_array($result))
	{
		echo "<tr>";
		for($i = 0;$i < $fields_count;++$i)
		{
			echo "<td>".$rec[$i]."</td>";
		}
		echo "</tr>";
	}
	echo "<table>";
?>