<!--
	php必须嵌套在html文档中
-->
<html>
	<head>
		<title>
			注释的方法
		</title>
	</head>
	<body>
	<!-- 
		HTML的注释块
	-->
	<?php 
		/*
			方式一：风格类似于C中的
			多行注释
		*/
		echo "风格类似于C中的多行注释/*...*/</br>"
		//方式2 ： 单行注释
		echo "风格类似于C,使用//</br>";
		#方式3：单行注释
		echo "风格类似于Unix shell,使用#</br>";
	?>
	</body>
</html>