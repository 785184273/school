<?php
	
?>
<!--
	索引：是系统内部自动维护的"数据表"，他的作用是可以极大的加快数据查找速度
			这个隐藏的数据表，其中的数据是自动排好序的，其查找速度就是建立在这个基础上的
		通常，所谓建立索引，就是指定一个表的某个或某些字段作为"索引数据字段"就好了，形式为
			索引建立(要建立索引的字段名)
		索引类型有如下几个
			普通索引：	形式：	key(字段名)
				含义：就是一个索引而已，没有其他作用，只能加快查找速度
			唯一索引：	形式：	unique key(字段名)
				含义：是一个索引，而且还可以设定其他字段的值不能重复，只能加快查找速度，可以为空
			主键索引：	形式：	primary key(字段名)
				含义：是一个索引，而且还能区分该表中的任何一行数据的作用，主键不能为空
			全文索引：	形式：	fulltext(字段名)
			外键索引：	形式：	foreign key(字段名) references 其他表(对应其他表中的字段名)
				什么叫外键索引？
					形式：foreign key(字段名) references 其他表(对应其他表中的字段名)
					外键：就是指设定的某个表(tab1)某个字段f1，他的数据的值，必须在另一个表tab2中某个字段f2中存在
					
		演示索引创建语法；
			create table tab_index(
				id int auto_increment,
				username varchar(20),
				email varchar(50),
				age int,				/*没有索引*/
				key(email),				/*这是普通索引*/
				unique key(username),	/*这就是唯一索引*/
				primary key(id)			/*这就是主键索引*/
			);
			此时该表中如果以id, username,或email做条件查找就会"很快",而以age做条件查找就会很慢
		演示外键索引：
		create table banji(
			id int auto_increment primary key,
			classid varchar(10) unique key,
			classteacher varchar(10) comment '班主任',
			open_date date comment '开班日期'
		);
		create table student(
			stu_id int auto_increment primary key,
			name varchar(10),
			age tinyint,
			banji_id int comment '班级id',
			foreign key (banji_id) references banji(classid)
		);
		此时，插入student表中的数据时，banji_id中的字段值，就不可以随便插入了
			而是banji表中的字段所已经有的数据值，才可以插入
	约束：就是要求数据需要满足什么条件的一种"规定"
		主要有如下几种约束
			主键约束
				primary key(字段名)
					含义(作用)：使该设定字段的值可以用于"唯一确定一行数据"
			外键约束
				foreign key(字段名) references 其他表名(对应其他表中的字段名)
					含义(作用)：使该字段的值，必须在其设定的对应的表中的对应字段中已经有该值了
			唯一约束
				unique key(字段名)
					含义(作用)：使该设定字段的值具有"唯一性"，自然也是可区分的
			非空约束
				not null其实就是设定一个字段时写的那个"not null"属性
			默认约束
				default XX值，其实就是设定一个字段的默认值
			检查约束
				check(某种判断语句)，比如
					create table tab1
					(
						age tinyint
						check (age >= 0 and age < 100)/*这就是检查约束*/
					);
		其实主键约束，唯一约束，外键约束，只是"同一件事情的"2个不同的说法，
			他们同时也称为；主键索引，唯一 索引，外键索引
	表选项列表
		表选项就是，创建一个表的时候，对该表的整体设定，主要有如下几个
			charset  = 要使用的字符编码
			engine = 要使用的存储引擎(也叫表类型)
			auto_increment = 设定当前表的自增长字段的初始值，默认是1
			comment = '该表的说明文字'
		说明1.设定的字符编码是为了跟数据库设定的不一样，如果一样就不需要设定了，因为其会自动使用数据库级别的设定
			2.engine在代码层面，就是一个名次：InnoDB,MyIsam,BDB,archive,Memory默认是InnoDB
		什么叫做存储引擎？
			存储引擎是将数据存储到硬盘的"机制",其实也就几周机制(如上述名字所述)
			不同的存储引擎其实主要是从两个大的层面来设计存储机制
				1.尽可能快的速度
				2.尽可能多的功能
			选择不同的存储引擎，就是上述性能和功能的权衡
			
		
-->