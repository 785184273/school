<?php
	//在php下，错误一般会显示在页面上，如果不想那样，可以使用die()函数
	/* 
	 * 1.die()函数输出一条信息并退出当前脚本
	 * 2.创建自定义错误处理器
	 * 	
	 * */
//	if(!file_exists("./test.txt")){
//		die("file not found");	
//	}else{
//		$file = fopen("./test.txt","r+");
//	}
	//创建错误处理函数
	function Error($errorno,$errormsg){
		echo "<b>Error:</b> [$errorno] $errormsg<br />";
	}
	
	//设置错误句柄
	set_error_handler("Error");

	//触发错误
	echo $c;
?>