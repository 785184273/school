<html>
<head>

</head>
<body>
<?php
define("PI",3.14);
function circle_area($diameter)
{
	$area=PI*$diameter*$diameter/4;
	return $area;
}
?>
<?php
$int_circle_diameter=10;
echo "ֱ��Ϊ".$int_circle_diameter."��Բ�����".circle_area($int_circle_diameter);
?>
</body>
</html>