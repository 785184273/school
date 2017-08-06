<html>
<head>
	<meta charset = "utf-8"/>
</head>
<form action="" method="post">
	以下属于Web开发语言的有哪几种？<br/>
	<input type="checkbox" name="answer[]" value="C语言">C语言<br/>
	<input type="checkbox" name="answer[]" value="PHP">PHP<br/>
	<input type="checkbox" name="answer[]" value="FLASH">FLASH<br/>
	<input type="checkbox" name="answer[]" value="ASP">ASP<br/>
	<input type="checkbox" name="answer[]" value="JSP">JSP<br/>
	1+1 = ?<br/>
	<input type="radio" name="answer1[]" value="2">2<br/>
	<input type="radio" name="answer1[]" value="1">1<br/>
	<input type="radio" name="answer1[]" value="0">0<br/>
	<input type="submit" name=bt_answer value="提交"/>
</form>
<?php
	if(isset($_POST['bt_answer']))
	{
		$answer=@$_POST['answer'];
		$answer1=@$_POST['answer1'];		
		$num=count($answer);	
		$num1=count($answer1);		
		$anw="";
		$anw1="";
		for($i=0;$i<$num;$i++)								
		{
			
			$anw=$anw.$answer[$i];							
		}
		for($a=0;$a<$num1;$a++)								
		{
			$anw1=$anw1.$answer1[$a];							
		}
		if($anw=="PHPASPJSP" && $anw1=="2" )
		{
			echo "<script>alert('回答正确！')</script>";
		}else if($anw=="PHPASPJSP" && $anw1 == "")
		{
			echo "<script>alert('回答正确！但请选择第二题')</script>";
		}else if($anw1=="2" && $anw == "")
		{
			echo "<script>alert('回答正确！但请选择第一题')</script>";
		}else if($anw=="PHPASPJSP" && $anw1!="2")
		{
			echo "<script>alert('第一题回答正确！第二题错误')</script>";
		}else if($anw1=="2" && $anw != "PHPASPJSP")
		{
			echo "<script>alert('第一题错误！第二题正确')</script>";
		}else if($anw1 != "2" && $anw != "PHPASPJSP")
		{
			echo "<script>alert('答案错误！')</script>";
		}
	}
	else
	{
		echo "<script>alert('请选择答案！')</script>";
	}
?>
</html>