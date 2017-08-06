<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>外部变量演示</title>
</head>

<body>
	<!--产生POST外部变量的HTML5表单form1-->
    <form action = "" method = "post">
    	学号:<input type = "text" name = "XH"><br/>
        姓名:<input type = "text" name = "XM"><br/>
        <input type = "submit" name = "postmethod" value = "POST方法提交">
     </form>
     <!--产生get变量的HTML5表单form2-->
     <form action = "" method = "get">
      	性别:<input name = "SEX" type = "radio" value = "男">男
        	<input name = "SEX" type = "radio" value = "女">女<br/>
        专业:<select name = "ZY">
        		<option>计算机</option>
                <option>信息网络</option>
                <option>软件工程</option>
             </select><br/>
         <input type = "submit" name = "getmethod" value = "GET方法提交">
       </form>
</body>
</html>
	<?php
		if(isset($_POST['postmethod']))
		{
			$XH = $_POST['XH'];
			$XM = $_POST['XM'];
			echo "接受POST变量：<br/>";
			echo "学号：".$XH."<br/>";
			echo "姓名：".$XM."<br/>";
		}
		if(isset($_GET['getmethod']))
		{
			$SEX = $_GET['SEX'];
			$ZY = $_GET['ZY'];
			echo "<br/>接收GET变量：<br/>";
			echo "性别：".$SEX."<br/>";
			echo "专业：".$ZY."<br/>";
		}
		echo "<br/>接收REQUEST变量：<br/>";
		echo "学号：".@$_REQUEST['XH']."<br/>";
		echo "姓名：".@$_REQUEST['XM']."<br/>";
		echo "性别：".@$_REQUEST['SEX']."<br/>";
		echo "专业：".@$_REQUEST['ZY']."<br/>";
		
    ?>

