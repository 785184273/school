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
echo "直径为".$int_circle_diameter."的圆面积是".circle_area($int_circle_diameter);
?>
</body>
</html>