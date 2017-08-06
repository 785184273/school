
<?php
	session_start();							//启动session
	if(isset($_POST['ok']))
	{
		$checkstr=$_SESSION['string'];			//使用$_SESSION变量获取EX5_10_image.php页面上的验证码
		$str=$_POST['check'];					//用户输入的字符串
		if(strcasecmp($str,$checkstr)==0)		//不区分大小写进行比较
			echo "<script>alert('验证码输入正确！');</script>";
		else
			echo "<script>alert('输入错误！');</script>";
	}
?>
