<?php
	$arr = array(
			array("name" => "小明","age" => "18"),
			array("name" => "小李","age" => "19"),
			array("name" => "小二","age" => "20")
		);
	$arr = json_encode($arr);
	echo $arr;
?>