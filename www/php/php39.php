<meta charset = "utf-8"/>
<?php
	$dbname = "php39";
	if(!empty($_GET['db']))
	{
		$dbname = $_GET['db'];
	}
	mysql_connect("localhost","root","123456") or die (mysql_error);
	mysql_query("use $dbname");
	mysql_query("set names utf8");
	$sql = "select * from stu";
	$sql = "show tables";
	$result = mysql_query($sql);
	echo "<table border = '1' style = 'text-align:center;margin:0px auto;'>";
	$field_count = mysql_num_fields($result);//获得结果集的列数;
		echo "<tr>";
			for($i = 0;$i < $field_count;$i++)
			{
				$field_name = mysql_field_name($result,$i);//获得结果集第i个字段的名字
				echo "<td>".$field_name."</td>";
			}
		echo "</tr>";
	while($rec = mysql_fetch_array($result))
	{
		$field_count = mysql_num_fields($result);//获得结果集的列数;
		echo "<tr>";
			for($i = 0;$i < $field_count;$i++)
			{
				//$field_name = mysql_field_name($result,$i);//获得结果集第i个字段的名字
				echo "<td>".$rec[$i]."</td>";
			}
		echo "</tr>";		
	
		/*
		echo "<tr>";
			echo "<td>".$rec[0]."</td>";
			echo "<td>".$rec[1]."</td>";
			echo "<td>".$rec[2]."</td>";
		echo "</tr>";
		//*/
	}
	echo "<table>";
?>