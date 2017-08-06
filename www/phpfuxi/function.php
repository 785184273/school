<?php
	function f1(){
		var_dump(func_get_args());
		var_dump(func_get_arg(1));	//
		var_dump(func_num_args());
	}
	f1(0,1,2,3,4);
	function f2(){
		$q = 1;
		$w = 2;
		function f3 ($q){
			echo $q;
		}
		f3($q);
	}
	f2();
?>