<html>
	<head>
	</head>
		<body>
		</body>
</html>
<!--
	页面跳转的方法
		1.html跳转
			<a>标记
		2.php跳转
			header('location:url 地址')
		3.js跳转
			location 对象
			属性
				href 	 	通过属性跳转可以返回	location.href		location.href = 'admin.php'
				assign		通过方法跳转，可以返回	location.assign()	location.assign('admin.php')
				reload		location.reload()	location.reload('admin.php') 
				replace		跳转不能返回		location.replace('admin.php')
				reload()可以用来做页面的跳转，但是一般都是来做刷新功能的
				刷新 location.reload();
-->