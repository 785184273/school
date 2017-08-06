<?php
	
?> 
<!--
视图定义语句
	视图：就是一个select语句(通常比较复杂)，我们给其一个名字，以后，要使用执行该select语句
		就很方便了，用该视图就好了
	视图的创建语法
		语法形式：
		create view 视图名[字段名1，字段名2，字段名3......] as select语句;
		举例：
		create view v1 as 
			select id,f1,name,age from 表名 where id > 7 and id < 10;
		使用视图：
			基本上当做一个表用就好了
		删除视图
			drop view [if exists] 视图名
-->