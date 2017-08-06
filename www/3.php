<html>
<head>
<title>
caonima
</title>
</head>
<body>
<?php
$a=1;
$b=2;
function sum()
{
	global $a,$b;
	$b=$a+$b;
}
sum();
echo $b;
echo "<br>";
echo "<hr>";
?>
</body>
</html> 