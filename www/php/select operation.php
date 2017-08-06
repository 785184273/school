<?php

?>
<!--
	子查询
		一个select语句，就是一个查询语句
			select 字段或表达式 from 数据源 where XX 条件判断
		上述select部分，from部分，where部分，往往都是一些数据或数据的集合
	可见，所谓子查询，就是在一个查询语句中的内部，某些位置又出现的查询语句
		两个概念
			主查询
			子查询
	常见子查询
		比较运算符中的子查询
		形式：
			操作数，比较运算符 (标量子查询)
		说明：
			操作数，其实就是比较运算符的2个数据之一，通常就是一个字段名
			例如：id > 5
		例子：select * from product where price = (select max(price) from product);
		使用in的子查询
			
		使用any的子查询
		形式：
			操作数 比较运算符 any (列子查询)
		含义：
			当某个操作数(字段)对于该列子查询的其中任意一个只，都满足该比较运算符，就算是满足了条件
			例子：select * from tab1 where id > any (select f1 from tab2)
		使用all的子查询
		形式
			操作数	比较运算符 all (列子查询)
		含义：
			当某个操作数(字段)对于该列子查询的所有数据值，都满足该比较运算符，则才算满足了条件
			即：要求全部满足，才算是满足
			例子：select * from tab1 where id > all (select f1 from tab2)
		使用some的子查询
			some是any的同义词
		使用exists子查询
			形式
				where exists(子查询)
			含义：
				该子查询如果有数据，则exists的结果是true，否则就是没有数据false
			说明：
				因为exists子查询的该含义，造成主查询往往出现这样的情形；要么全部取出，要么都不取出
			在实际应用
				该子查询往往都不是独立的子查询，而是会需要跟住查询的数据表，建立某种关系，
				--通常就是建立连接，建立的方式是'隐式'的，即没有在代码上体现关系，但却在内部有其连接的实质
				此隐式方式，通常就体现在子查询的where条件语句中，使用了住查询表中的数据(字段)
				举例：
					select * from product where exists(
						select * from product_type
							where product_name like '%电%' and protype_id = product.protype.id
					);
			注意：
				1.这种子查询语句，是不能独立存在的，而是必须跟主查询一起用
				2.其他子查询是可以对运行的，而且会得到一个运行的结果
				3.该子查询中的条件，应该设定为跟主查询的某个字段有一定的关联性判断，通常该判断就是两个表的本来该有的连接条件
-->