<meta charset = "utf-8"/>
<?php
	header("content-type:text/html;charset = utf8");
	ini_set("session.use_only_cookie",'0');
	ini_set("session.use_trans_sid",'1');
	session_start();
	$_SESSION['name'] = 'kang';
?>
<a href = " ">席吧</a>
<hr>
<form action = " " method = "POST">
	<input type = "submit" value = "提交">
</form>