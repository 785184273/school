<html>
	<head>
	</head>
		<body>
			<!--
				插入数据
					语法：insert into 表名(字段名1,字段名2) values (值1,值2);
					注意：插入字段可以和数据库中的字段顺序不一致，但是值和插入字段的顺序必须一致。
						  插入字段是可以省略的(不推荐省略)，插入的值和数据表的字段顺序和个数都一致 
							insert into stu1 values (值1，值2，....);
						  自动增长的插入
							insert into stu values (null,'值1','值2'....);
						   默认值的插入
							insert into stu values (null,'辛弃疾','男',default,68);
							insert into 表名 (字段名1，字段名2....) select (字段名1，字段名2....) from 表名
							注意：将select语句查询结果数据(可能多条)都插入到指定的表中
								其中，也需要注意字段的对应，select出来的字段数
							replace into 表名 (字段名1，字段名2....) values (值1，值2....)
							注意：其跟insert into 几乎一样，唯一的区别是，如果插入的数据的主键或唯一键有重复
								则此时就会变成"修改该行数据"
				load data(载入数据)语法
					他适用于载入如下所示的"结构整齐的纯文本"
						当然前提是有一个这样的对应结构的现有的表
						语法形式
							load data infile "完整的数据文件路径" into table 表名;
				修改数据
					语法：update 表名 set 字段1 = 值l,字段2 = 值2，......[where 条件] [order by 排序] [limit 限制 1起始位置 2记录数];
						  说明：1.通常update语句也需要where条件，否则就会修改所有数据
								2.where条件的语法跟select中的语法一样
								3.order by 用于设定修改的顺序，limit用于设定修改的行数，它们通常是结合使用的
								4.实际应用中，通常很少用到order by和limit，则修改的数据的常规使用形式就成为
									update 表名 set 字段1 = 值l,字段2 = 值2，......where 条件
						  update stu1 set sex = "女";  将所有字段的性别都改成了女
						  update stu1 set name = "五开" where id = '1';将id = 1的学生的名字改成吴开。
				删除数据
					语法：delete from 表名 where 条件 [order by 排序] [limit 限定]
					说明：
						1.删除数据是以"行"为单位进行
						2.通常删除数据都需要带where条件，否则就会删除所有数据
						3.where条件的语法跟select中的语法一样
						4.order by 排序设定，用于指定这些数据的删除顺序，他通常跟limit配合使用才有意义
						5.limit限定用于设定删除多少行(按order by设定的顺序)
						
				查询数据
					基本语法：select [all | distinct] 字段或表达式列表 [from 表名] [where子句] [group by 子句] [having子句] [order by 排序] [limit 限制 1起始位置 2记录数];;
						说明：1.字段自然是来源与表，必须依赖于from
							  2.表达式类是这样一个内容：8，8+3，now()
							  3.每个输出项(字段或表达式结果)都可以给其设定一个"别名"
									例如：select new() as 时间;
							  4.all 和distinct
								用于设定select出来的数据是否消除重复行，可以不写，默认值是all
								all:表示不消除，即所有都出来
								distinct:表示会消除
							  5.from子句表示select部分从取得数据的数据源--其实就是表
								通常后面都是表名，但也可能是其他数据的来源
								select输出(取出)部分,如果给出的字段名，则其必然来源于这里的"数据源"的字段
							  6.where子句
								说明：
									1.where子句就是对from子句中的数据源中的数据进行条件设定，筛选的机制是一行一行的进行判断，其作用几乎跟各种语言的if语句作用一样
									2.where子句依赖from子句
									3.where子句中通常都需要使用各种的运算符
										算数运算符： + - * / %
										比较运算符：> < >= <=  =(等于) <>(不等于) ==(等于) !=(不等于)
										逻辑运算符：and or not
											not的实例
												select * from user where not(sex = '男');
						  select 列名 from 表名 [where 条件] [order by 排序] [limit 限制 1起始位置 2记录数];
							select name，sex from stu1;
							查询我们班所有男生的信息
							select * from stu1 where sex = '男';
					is运算符：空值和布尔值的判断
						有4种情况的使用
							XX is null：判断某个字段是null值--就是没有值
							XX is not null：判断某个字段不是'null'值
							XX is true :判断某个字段为"真"(true)
							XX is_false:判断某个字段为"假"
						所谓布尔值，其实就是tinyint(1)这个类型的别名，本质上就是判断这个数字是否为0；
					between运算符：范围判断
						用于判断某个字段的数据值是否在某个给定的范围--适用与数字类型
						语法：
							XX between 值1 and 值2
						含义：
							XX字段的值在给定'值1'和'值2'之间，其实相当于：XX >= 值1 and XX <= 值2
					in运算符：给定确定数据的范围判断
						语法：XX in(值1，值2，值3.....)
						含义：
							表示字段XX的值为所列出的这些值中的一个，就算是满足了条件，这些值通常是零散无规律的
					like运算符(模糊查找)
						语法：
							XX like '要查找的内容'
						含义：
							实现对字符串的某种特征信息的模糊查找，他其实依赖于以下2个特殊的符号
								%	：匹配任何个数的任何字符
								_	: 匹配一个任意字符
								[]	: 匹配[]中的任意一个字符
								[^] : 不匹配[]中的任意一个字符
							例子；name like '%罗%'；
								name like '%罗';
								name like '罗%';
								name like '罗_';
								name like '[bav]罗';
					group by 子句
						形式：
							group by 字段1[desc|asc]，字段2[desc|asc]，......
						带有group by子句的查询语句中select子句后面的查询结果集只能包含分组语句句和聚合函数
						说明：
							1.分组是对前述找出的数据(即where已经筛选过了的)进行某种指定标准的排序
							2.同时，该分组结果可以同时指定其排序方式：desc倒序，asc顺序
							3.通常，分组就一个字段，2个以上很少
						分组？
							就是将多行数据以某种标准(就是指定的字段)进行分类的存放
							特别注意
								分组之后的结果，一定要理解为：只有一个一个的组
								则结果是在select语句中的取出部分：只应该出现组的信息
							select 组信息1，组信息2.......from 数据源  group by 字段
							在实际的应用中，通常只有如下的几种可用的分组信息(即可以出现在select中)
								1.分组依据本身的信息，其实就是该分组依据的字段名
								2.每一组的'数量'信息，就是用count(*)获得
								3.原来数据中的数值类型字段的聚合信息,包括如下几个：
									最大值 max(字段名)
									最小值 min(字段名)
									平均值 avg(字段名)
									sum值  sum(字段名)
					having分组
						having的作用和where完全一样，但其只是对分组的结果数据进行筛选
							where对原始数据进行筛选(where子句中不能包含聚合函数)
							having对分组之后的数据进行筛选(having子句中经常包含聚合函数)
					order by子句
						形式
						order by字段1 [asc | desc]，字段2 [asc | desc]
						说明:1对前面的结果数据以指定的一个或多个字段排序
							 2多个字段的排序，都是在钱一个字段排序基础上，如果还有相等值，才继续以后续字段排序
						排序：由低到高升序 asc
							  由高到低降序 desc 
							  注意：默认是升序排列
							 按成绩由高到低排列
							 select * from stu1 order by score desc
					limit限定子句
						含义：用于将前述取得的数据，按照指定的行取出来，从第几行开始取出多少行
							select * from stu1 limit 0,3; 从0开始取三条
							注意：数据库里面第一条的位置是0
							按成绩降序排列前三名
								select * from stu1 order by score desc limit3;

				运算符
					比较运算符
						>				
						>=				
						<				
						<=				
						=				等于
						<>				不等于
					逻辑运算符
						and				与
						or				或
						not				非
				聚合函数
					Sum():求和
					Avg():求平均值
					Max():求最大值
					Min():求最小值
					count():记录数
					求最高分
						select max(score) from stu1;
					求最低分
						select min(score) from stu1;
					求合
						select sum(score) from stu1;
					求平均值
						select avg(score) from stu1;
					总人数
						select count(id) from stu1;
					男生的人数
						select count(*) from stu1 where sex='男';
			-->
		</body>
</html>
