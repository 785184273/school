<?php
	header("content-type:text/html;charset=utf-8");
	include'./libs/Smarty.class.php';
	
	$smarty = new Smarty();
	
	$smarty->display("03.1.html");