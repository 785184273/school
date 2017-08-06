<!--
	静态变量的使用
	静态变量：也在函数内部申明，但函数结束运行后，它所占用的存储空间依然存在，
	它的值在该函数再次被调用前保持不变
	格式：static 变量名
-->
<html>
	<head>
		<title>
			静态变量的使用
		</title>
	</head>
	<body>
		<?php 
			function test(){
				static $count=0;
				$count++;
				echo $count;
				echo "<br>";
			}
			test();
			test();
		?>
	</body>
</html>