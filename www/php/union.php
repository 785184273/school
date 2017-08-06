<?php
	
?>
<!--
联合查询union
	基本概念
		将两个具有相同字段数量查询语句的结果，以上下堆叠的方式合并到一起
		成为一个新的结果集，结果集是两个独立select查询语句的结果行数的和
	语法形式
		select 语句1
		union [all | distinct]
		select 语句2
	注意：
		可以联合更多的查询结果，不只是两个
		此联合查询语句，默认会消除重复行，即默认是distinct，如果想要将所有的数据都显示出来就选择all
	细节：
		应该将这个联合查询的结果理解为最终也是一个"表格数据",且默认使用第一个select语句中的字段名
		默认情况下，order by子句和limit子句只能对整个联合之后的结果进行排序
			和数量限定：select.....union select order by XXX limit m,n
		如果第一个select语句值的列有别名，则order by子句中就必须使用该别名
	联合查询可以实现全外连接
		select * from student left join class on student.classid = class.classid
		union
		select * from student right join class on student.classid = class.classid
-->