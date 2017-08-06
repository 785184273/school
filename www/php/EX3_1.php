<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>标记应用</title>
<style>
	p{
		text-align:center;
		font-family:"黑体";
		font-size:24px;
		}
</style>
</head>

<body>
	<p>HTML5页面</p>
    <?php
		$str1 = "php变量1";
		$str2 = "php变量2";
		echo "<script>";
		echo "alert('".$str1."');";
		echo "<script>";
    ?>
    <input type = "text" name = "tx" size = 20 /><br />
    <input type = "button" name = "bt" value = "单击" onclick = "tx.value='<?php echo $str2;?>'">
</body>
</html>