<?php
	//制作传统的分页效果
	header("content-type:text/html;charset = utf-8");
	$link = mysql_connect("localhost",'root','123456');
	mysql_query("use class");
	mysql_query("set names utf8");
	
	$sql = "select * from login";
	$result = mysql_query($sql);
	
	//获取总的记录条数
	$total = mysql_num_rows($result);
	
	//每页获取七条
	$pre = 7;
	
	$sql2 = "select * from login limit 0,7";
	$result2 = mysql_query($sql2);
	echo "<table border = 1 rules = all>";
			echo "<tr>";
				echo "<td>帐号</td>";
				echo "<td>密码</td>";
			echo "</tr>";
	while($re = mysql_fetch_array($result2)){
			echo "<tr>";
				echo "<td>$re[0]</td>";
				echo "<td>$re[1]</td>";
			echo "</tr>";
	}
	echo "</table>";