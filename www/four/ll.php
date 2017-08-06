<html>
	<head>
		<meta charset="utf-8"/>
	</head>
<?php
	session_start();
	session_unset();
	session_destroy();
	echo"<script language=javascript>alert('\“注销\"');window.location.href='http://127.0.0.1/four/denglu.html';</script>";
	
?>
</html>