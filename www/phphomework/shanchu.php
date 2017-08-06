<?php
	$input1 = array(1,2,3,4,5,6);
	$input2 = array(1,2,3,4,5,6);
	$input3 = array(1,2,3,4,5,6);
	$output1 = array_splice($input1,3,2);
	print_r($input1);
	print_r($output1);
	$output2 = array_splice($input2,4,0,7);
	print_r($input2);
	$output3 = array_splice($input3,3,2,array(7,8));
	print_r($input3);
?>