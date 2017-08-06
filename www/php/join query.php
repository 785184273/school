<?php

?>
<!--
连接查询
	就是将两个或两个以上的表"连接"起来，当做一个数据源，并从中去取得所需呀的数据
	怎么连接？
		将每一个表的每一行数据两两之间对接起来，每次对接的结果都是连接结果的一行
	语法：select * from tab1,tab2;
		  select * from tab1 join tab2;
		  select * from tab1 cross join tab2;
		其实他们都叫交叉连接，没有条件的连接--全部连接起来
连接的基本形式
	tab1 [连接形式] join tab2 [on 连接条件];
	如果是三个表连接
	tab1 [连接形式] join tab2 [on 连接条件] [连接形式] join tab3 [on 连接条件]
连接主要分一下几种
	交叉连接
		将所有数据进行连接，又称为笛卡尔积
	内连接
		形式
		select * from tab1 [inner] join tab2 on 连接条件
		例如
		select * from student inner jonin class //在没有连接条件下此连接实际是交叉连接，在连接条件下就等于where子句的筛选
		on student.classid = class.classid //连接条件
		注意：
			这种的表跟表之间的内连接查询，虽然可以体现为表跟表之间的'关系'--通常就是外键关系
			但并不是有外键关系才能使用
	左(外)连接left(outer)join
		含义：其实就是将两个表的内连接结果，再加上左边表的不符合内连接所设定条件的数据的结果
		形式
			tab1(左表) left [outer] join tab2(右表) [on 连接条件]
		注意：左连接的结果，左边表的数据一定都会全部取出来
	右(外)连接right(outer)join
		含义：其实就是将两个表的内连接结果，再加上右边表的不符合内连接所设定条件的数据的结果
		形式
			tab1(左表) right [outer] join tab2(右表) [on 连接条件]
		注意：左连接的结果，右边表的数据一定都会全部取出来
	全(外)连接full(outer)join
		mysql不支持全连接的语法
		含义：其实就是将两个表的内连接结果，再加上左边表的不符合内连接所设定条件的数据的结果，再加上右边表的不符合内连接所设定条件的数据的结果；
-->