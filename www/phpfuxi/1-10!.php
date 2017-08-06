<?php
	function test(){
		$result = 1;
		for($i = 1;$i <= 10;++$i){
			$result = $result * $i;
		}
		return $result;
	}
	echo test();
?>