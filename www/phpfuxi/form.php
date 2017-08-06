<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
	<input name = "username" id = "username"/>
	<input name = "password" id = "password"/>
	<input type="submit" value = "点击"/>
</form>
<?php
	header("Content-type:html/text;charset = utf8");
	//echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>