<!DOCTYPE html>
<!-- HTML5表单，包含五个复选框和一个提交按钮 -->
<form action="" method="post">
	以下属于Web开发语言的有哪几种？<br/>
	<input type="checkbox" name="answer[]" value="C语言">C语言<br/>
	<input type="checkbox" name="answer[]" value="PHP">PHP<br/>
	<input type="checkbox" name="answer[]" value="FLASH">FLASH<br/>
	<input type="checkbox" name="answer[]" value="ASP">ASP<br/>
	<input type="checkbox" name="answer[]" value="JSP">JSP<br/>
	<input type="submit" name=bt_answer value="提交">
</form>
<?php
	if(isset($_POST['bt_answer']))
	{
		$answer=@$_POST['answer'];							//$answer是数组
		if(!$answer)
			echo "<script>alert('请选择答案')</script>";
		$num=count($answer);								//使用count函数取得$answer数组中值的个数
		$anw="";											//初始化$anw为空
		for($i=0;$i<$num;$i++)								//使用for循环
		{
			$anw=$anw.$answer[$i];							//将$answer中的值连接起来
		}
		if($anw=="PHPASPJSP")								//判断是否是正确答案
			echo "<script>alert('回答正确！')</script>";		//弹出提示框提示正确
		else
			echo "<script>alert('回答错误！')</script>";		//弹出提示框提示错误
	}
?>
