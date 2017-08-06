<?php
	/*
	$a = array(0,1,2,3,4,5,6,7,8,9);
	$len = count($a);
	$b = $a[rand(0,$len - 1)];
	echo $b;
	$c = range('A','Z');
	var_dump($c);
	echo "<hr>";
	*/
	$image = imagecreate(100,100);
	$red = imagecolorallocate($image,255,0,0);
	imagefill($image,0,0,$red);
	$blue = imagecolorallocate($image,0,0,255);
	imagesetpixel($image,50,50,$blue);5
	header('Content-type:image/gif');
	imagegif($image);
	imagedestroy($image);
?>
<!--
	
-->