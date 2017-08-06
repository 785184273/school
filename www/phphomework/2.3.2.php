<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP交互页面演示</title>
</head>

<body>
	<form method="post">
	请输入边长：<input type="text"name="rad"/>
	<input type="submit"name="button" value="提交"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST["button"]))
	{
		$Rad=$_POST["rad"];
		$Area=$Rad*$Rad;
		echo"正方形的面积为".$Area;
	}
?>