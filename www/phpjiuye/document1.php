<?php
	header("content-type:text/html;charset = utf-8");
	$file = "./document.text";
	$handle = fopen($file,"r+");
	$lock_result = flock($handle,LOCK_EX | LOCK_NB);
	if($lock_result){
		//sleep(10);
		$result = fwrite($handle,"长太息以掩涕兮，哀民生之多艰");
		var_dump($result);
	}else{
		echo "文件被锁定<br />";
	}

?>