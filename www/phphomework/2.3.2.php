<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP����ҳ����ʾ</title>
</head>

<body>
	<form method="post">
	������߳���<input type="text"name="rad"/>
	<input type="submit"name="button" value="�ύ"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST["button"]))
	{
		$Rad=$_POST["rad"];
		$Area=$Rad*$Rad;
		echo"�����ε����Ϊ".$Area;
	}
?>