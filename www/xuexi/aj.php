<?php
	header("Cache-Control:no-cache");
	header("Pragma:no-cache");
	header("Expires:-1");
	
	$fp = fopen('./aj.txt','a');
	fwrite($fp,'ajax');
	fclose($fp);
?>