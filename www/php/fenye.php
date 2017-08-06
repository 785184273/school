<html>
	<head>
	</head>
		<body>
			
		</body>
</html>
<!--
	分页功能
		思路：通过limit语句取出当前页面的数据
		语句：select * from stu limit 0,10	取出前10条数据
		页码						代码
		1			select * from stu limit 0,10
		2			select * from stu limit 10,10
		3			select * from stu limit 20,10
		一页放10条记录，请写出起始位置和页码的关系？
		起始位置 = （页码-1）*页面内容记录
		1，求总记录数
		$sql = "select count(*) from stu";
		$result = mysql_query($sql,$cnd);
		$record = mysql_fetch_row($result);
		echo $record[0];
		2,总页数
		$pagecount = ceil($recordcount/$pagesize);
		echo $pagecount;
		3，起始位置
		4，分页
-->