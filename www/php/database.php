<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
	<!--
    	连接数据库
			安装好数据库后，mysql自带一个mysql命令行客户端，这个客户端很方便，但是只能连接本地的mysql
				我们一般都用windows命令行连接数据库服务器
				在登录数据库系统之后，需要使用"set names 编码名"，来设定当前链接数据库的"环境编码名"
					通常来说：
						cmd客户端中固定的gbk编码
						而在php网页中，是该网页文件的编码(现在的主流都是utf8)
				强烈建议每次登录就执行该编码；
			数据库的备份和恢复
				备份：就是将一个数据库，完整的"转换为"一个可以随时"携带和传送"的文件
					语法：mysqldump -h服务器地址 -u登录名 -P端口号 -p  数据库名>文件名
				恢复：就是将一个备份的数据库文件完整的还原为一个可以使用的数据库
					语法：mysql -h服务器地址 -u登录名 -P端口号 -p	数据库名<文件名
				注意：
					1.这两个命令都是在没有登录进去的时候使用
					2.其中mysqldump命令还要求管理员身份
					3.通常恢复就是指恢复原来数据库中的所有表数据信息及其他信息，而数据库名可以是原来的名字或新的名字
				在dos环境下命令后面没有分号，在mysql环境下，命令后面有分号
				几个dos命令
					进入盘符：
						语法：	盘符：
							例如进入f盘	f:
					进入盘符下某个文件：
						语法：	cd wamp/wamp/www
					查看某个文件下的所有文件
						语法：dir
					进入mysql数据库命令
						语法：mysql -hlocalhost	-uroot	-p -P3306;
							:mysql -uroot	-p;	端口号是3306可以省略
							:mysql -uroot;如果连接的是本地ip地址也可以省略；
					退出数据库的方法(在登录了mysql之后才能退出)
						语法：exit；
							  quit：
							  /q;
				连接mysql服务器需要的参数
					host	主机	-h
					username	用户名	-u
					password	密码	-p
					port	端口	-P
				数据库的操作：数据库本质就是一个文件，操作数据库的软件叫数据库管理系统
				数据库的创建
					create 	database 数据库名 [charset = "字符编码"] [collate 排序规则];
					说明：
						1.字符编码是用于设定当前数据库中存储的字符内容以什么编码来存储
						2.collate排序规则用于设定其中的字符内容的"大小关系"(先后顺序),对于英文，基本没有任何问题
							例如： abc  abd  后者大
									d	abc  前者大
									.......
							所有的对于英文字符的比较，本质上都是“单个字符”的比较，对于中文就成问题了
								例如：印度	中国	？
							排序规则就是用于设定类似这种字符的大小关系或先后顺序的一种规定！
							实际我们代码中（应用级别）,只是一个名字，排序规则名
								而且，通常每种字符编码，都有一个默认的排序规则，后面的排序规则我们一般都不写
				显示mysql中的所有可用的字符编码(共39种)
					show charset;
				显示mysql中所有的可用的排序规则(共195种)
					show collation;
					实际应用中，我们使用某个字符集，可用的与之对应的排序规则，可选项很少，通常和只有两个，当然，我们一般也都不使用
					
					如果创建已经存在的数据库会报错
						创建数据库之前先判断一下，如果不存在就创建
							语法：
							create database if not exists 数据库名
					如果创建数据库名字是一个关键字会报错
						解决办法：在名字上加上反引号（波浪号键）。
				查看所有数据库
					show databases;
				删除数据库
					drop database 数据库名;
					如果删除不存在的数据库会报错
						drop database [if exists] 数据库名
					说明：if exists是用于一种"安全运行"的考虑，如果数据库不存在，也不会报错，否则会报错
				查询数据库的创建语句
					show create database 数据库名
				创建数据库的时候指定字符编码
					create database 数据库名 charset=字符编码
				更改数据库
					更改数据库的字符编码和排序规则
						alter database 数据库名 charset 新的编码名 collate 新的排序规则名
				选择数据库
					use	数据库名
				关于数据库中的几个概念
					行也叫记录，一行就是一条记录
					列也叫字段，一列就是一个字段，字段也叫属性
					一个表里面包含多个字段
				创建表
					语法：create table 数据表名（
						  字段1 	数据类型，[null | not null] [auto_increment]
						  字段2 	数据类型，
						  ......）;
					字段设定形式
						字段名	类型	[字段属性1 字段属性2 字段属性3 ...]
						说明：
							1.字段名可以自己取
							2.类型就是前面所学的数据类型：int tinyint float double char varchar text
							3.字段属性可以有多个,(根据具体的需要)，相互之间直接空格隔开
								auto_increment：只用于整数类型，让该字段的值自动获得一个增长值，通常做一个表的第一字段的设定，并且通常还当做主键
									主键的特点：不能重复，不能为空
									一个表只能有一个主键，主键可以由多个字段一起组成
								primary key：用于设定该字段为主键，此时该字段的值可以唯一确定一行数据
								not null：用与设定该字段不能为空
								unique key: 设定该字段是唯一的，也就是不重复的
								default XX值：用于设定该字段的默认值，此时如果insert没有给值的时候就使用默认值
								comment '字段说明文字'
				字段类型(数据类型)
				  总揽：在mysql中，数据类型主要分3大类，数字型，字符型，时间型
				  数据类型在mysql中，主要用于创建一个表的时候设定字段的类型
				整数类型
					主要有：
						int tinyint smallint mediumint bigint
					整数类型所占空间(字节):
						int:占4个字节，即32位
						tinyint：占1个字节，即8位，最多能存储256个数字，默认范围是-128-127；
						bigint：占8个字节，即64位
					整数类型字段的设定形式
						类型名[m][unsigned][zerofill]
					说明：
						1.M表示设定该整数的"显示长度",即select输出的时候，123可能显示为000123(假设m为6)
						2.unsigned用与设定该整数为“无符号数”，其实就是没有负数
						3.zerofill用于设定是否填充"0"到一个数字的左边，此时需要设定的长度M配合使用
				小数类型
					主要有3种
						float double decimal
					float:单精度浮点型，使用4个字节存储数据，其精度大约只有6-7个有效数字位数
					double:双精度浮点型，使用8个字节存储数据，其精度大约有20个有效数字数位
					decimal:定点小数类型，整数类型最长可以有65位，小数部分最长可以有30位，一般设置格式为decimal（总位数,小数部分位数）
				字符串类型 
					mysql中的字符串应该使用单引号引起来
					varchar 类型
						变长度字符串，使用时我们必须设定其长度，最大长度"理论值"65535，其实实际最大长度为65533
						，但是考虑到存储的字符编码不同，也会有进一步的减少，比如，如果存储中文gbk，则最多是65533/2个
						如果存储中文utf8，则最多是65533/3个
						此类此的实际长度是存储内容决定的，而设定的值只是表示最多可存储的字符个数
						
					char 类型
						定长字符串，使用时通常需要设定长度，如果不设定，默认是1，最大理论长度是255个
						定长字符串适用于存储的数据都是可预见的明确的固定长度的字符，比如手机号码，中国邮政编码
						实际存储的时候，如果少于设定的长度，也能存，但是都会补空格填满
					enum 类型
						单选项字符串数据类型
						他非常适合存储表单界面的"单选项值";
						他设定的时候，是需要给"固定的几个选项"，然后存储的时候，就值存储一个值
						形式如下
							enum("选项1","选项2","选项3"......);
						实际内部
							这些字符串选项值对应的是如下数字值：1，2，3，4......最多65535个选项
						写入数据的形式
							可以用该选项字符串本身，也可以用对应的数字
					set 类型
						多选项字符串数据类型
						他非常适合存储表单界面的"多选项值";
						他设定的时候，也需要给"固定的几个选项"，然后存储的时候，就可以存储其中若干个值
						形式如下
							set("选项1","选项2","选项3"......);
						实际内部
							这些字符串选项值对应的是如下数字值：1，2，4，8......最多64个选项
						写入数据的形式
							可以用该选项字符串并用逗号分开，也可以用对应的数字的和
					text 类型
						他称为"长文本"字符类型，通常，其中存储的数据不占据表格中的数据容量限制，其本身最长可存储65535个字符
						其他同类字符类型：samlltext tinytext longtext
					时间类型
						datetime类型
							时间日期类型
						date类型
							日期类型
						time类型
							时间类型
						year类型
							年份类型
						timestamp
							时间戳类型，就是值一个时间的"数据值"本质其实就是一个数字
							他的一个重要作用是，他会自动获取时间戳的数据值--相当于"now()";
						在应用中，时间日期类型，在我们自己给定的数据情形下，需要使用"单引号"引起来，和字符串一样
					binary类型：定长二进制字符串类型
					varbinary类型：变长二进制字符串类型
					blob类型：二进制类型，存的仍然是二进制值，适用于存储图片，其他文件等，但极少用
					int：整型
					char():字符		定长
					varchar：字符		可变长度
					text: 大段文本
					decimal（总位数,小数位数）: 小数
					电话号码：		varchar
					性别：			char
					年龄：			int
					照片信息：		binary
					薪水：			decimal
					QQ：			varchar()
					手机号：		char()
				查看所有表
					语法：show tables;
				显示创建表的sql语句
					语法：show create table stu;
				显示表结构
					语法: describe  | [desc]		表名
				删除表
					语法：drop table 表名
				修改表
					1.创建表能做的事情，修改表几乎都能做--但很不推荐去修改表，而是在创建表的时候就基本确定表的结构
					2.修改表是指，修改表的结构--正如创建表也是设定表的结构
					3.大体来说，有：
						3.1可以对字段进行，添加，删除，修改
						3.2可以对索引进行添加，删除
					4.表的选项通常都是修改，即使不写任何表的选项，他们都有默认值
					常见的几个
						添加一个表的字段
							alter table 表名 add [column] 新字段名 字段类型 [字段属性列表];
						修改一个表的字段
							alter table 表名 change [column] 旧字段名 新字段名 字段类型 [字段属性列表]
						删除字段
							alter table 表名 drop [column] 字段名
						删除主键
							alter table 表名 drop primary key 主键名
						删除外键
							alter table 表名 drop foreign key 外键名
						删除索引
							alter table 表名 drop key 索引名
						添加普通索引
							alter table 表名 add key [索引名] (字段名1[,字段名2,......])
						添加唯一索引
							alter table 表名 add unique key(字段名1[,字段名2,......])
						添加主键索引
							alter table 表名 add primary key(字段名1[,字段名2,......])
						修改表名
							alter table 旧表名 rename [to] 新表名 
						修改表中字段类型
							alter table 表名 modify 字段名 (字段类型)
					其他表的相关语句
						从已有表复制表的结构：create table [if not exists] 新表名 like 原表名 
						实例：
							create table tab_choice1 like tab_choice;
								把tab_choice表的结构复制到表tab_choice1;
							insert into tab_choice1 select * from tab_choice;
								把表tab_choice内的数据复制到表tab_choice1中;
			数据控制语句
				数据控制语句，是用于对mysql的用户机器权限进行管理的语句
			用户管理
				用户数据的所在位置
					mysql中的所有用户，都存储在系统数据库mysql中的user表中--不管哪个数据库的用户都存储在这里
			创建用户
				create user '用户名'@'允许登录地址/服务器' identified by 密码
				说明：
					1.允许登录的地址/服务器就是允许该设定的位置，来使用该设定的用户名和密码，其他的位置不行
					2.可见，mysql的安全身份验证，需要三个信息
			删除用户
				drop user '用户名'@'允许登录的地址或服务器'
			修改用户密码
				修改自己的密码：
				set password = password('密码')
				修改他人的密码(前提是自己有权限)
				set password for '用户名'@'允许登录的地址或服务器' = password('密码')
			权限管理
				all:代表所有权限
			授予权限
				形式：
					grant 权限列表 on 某库.某个对象 to '用户名'@'允许登录的地址或服务器' [identified by 密码]
				说明：
					1.权限列表就是多个权限的名词，相互之间用逗号分开，也可以用all
					2.某库.某个对象，表示，给指定的某个数据库中的某个'下级单位'授权
						下级单位有：表名，视图名，存储过程名，存储函数名
						其中，有两个特殊的语法
							*.*：代表所有数据中的所有下级单位
							某库.*：代表指定的该库中的所有下级单位
					3.[identified by 密码]是可神略的部分，如果不省略，就是在授权的同时，也去修改他的密码
						但是：如果该用户不存在，此时其实就是创建一个新的用户，并此时就必须设置其密码了
			剥夺权限
				形式
					revoke 权限列表 on 某库.某个对象 to '用户名'@'允许登录的地址或服务器' [identified by 密码]
			事务控制语言
				事务：事务就是用来保证多条'增删改'语句的执行'一致性'：要么都执行，要么都不执行
				事务的特点：
					原子性
					一致性
					隔离性
					持久性
				事务模式
					在cmd命令行模式中，是否开启了一条语句就是一个事物的开关
					默认情况下，这个模式是开启的，称为自动提交模式
					我们可以将其关闭，称为非自动提交模式--需要人为提交
				关闭该模式
					set autocommit = 0
				开启模式
					set autocommit = 1
				事务执行的基本流程
					1.开启一个事务
						start transaction	//也可是begin
					2.执行多条增删改语句	//也就是相当于希望这多条语句要作为一个不可分割的整体去执行的任务
					3.判断这些语句执行的结果情况
						if(没有出错)
						{
							commit; 	//提交事务，此时就是一次性完成
						}else
						{
							rollback;		//回滚事务,此时就是都没做
						}
					具体有2种做法
					 在cmd中：
						begin //开启事务
						insert into o1 values(1,2,3);
						insert into o1 values(4,5,6); //执行多条语句如果语句正确
						commit;	//两条语句都成功的插入
						insert into o1 values(7,8,9);
						insert into o1 values("你大爷的",11,22); 
						//每个字段的类型都是int,所以插入的数据不能是字符串，第二条语句错误
						//当任意一条语句出现错误则执行回滚事务
						rollback
						//此时两条语句都没执行，没成功插入
					在php中
						....php代码页面
			mysql编程
				mysql编程中语句块包含符
				其实就是相当于js或php中大括号语法
					[标识符：]begin
						//语句
					end [标识符];
				标识符就是定义任意的名字而已
					if(条件判断)
					begin
						//。。。
					end;
					if(条件判断)
					A：begin
						//。。。
					end A;
					A就是标识符，他的作用是"标识"该语句块，以其可以在该语句块中使用它--其实就是退出
				流程控制
					if语句
					case语句示意
						case @v1
							when 1 then
							begin
								//...
							end;
							when`2 then
							begin
								//...
							end;
							else
							begin
								//...
							end;
						end case;
					loop循环语句
						标识符：loop
						begin
							//这里是循环的语句块....
							//注意：这里必须有一个'退出循环'的逻辑机制，否则该循环就是死循环
							if(条件)then
								leave 标识符·	//退出;
							end if;
						end;
						end loop 标识符
					while循环
						set @v1 = 1;
						while @v1 < 10 do 
						begin
							set @v1 = @v1 + 1;
						end;
						end while;
					repeat循环
						set @v1 = 1;
						repeat
						begin
							set @v1 = @v1 + 1;
						end;
						until @v1 >= 10; //注意：条件满足就跳出循环
						end repeat
					leave语句
						leave标识符
						用来退出begin end结构或其它具有标识符的结构
				mysql中的变量
					mysql中有两种变量形式
						普通变量：不带@符号
							定义形式：declare 变量名 类型名 [default 默认值]; 普通变量必须先这样定义
							赋值形式
								set 变量名 = 值;
							取值:直接使用变量名
							使用场所：只能在编程环境中使用
								什么是编程环境？
									定义函数的内部
									定义存储器的内部
									定义触发器的内部
						会话变量：带@符号
							定义形式：set @变量名 = 值; //跟php类似，无需定义，直接赋值，第一次就算是定义
							取值：直接使用变量名
							使用场所：基本上都可以使用
					变量的赋值
						普通变量：set 变量名 = 表达式
						会话变量：set @变量名 = 表达式
						会话变量：select @变量名 := 表达式
						会话变量：select 表达式 into @变量名
				mysql函数
					函数，也说成存储函数，其实就是js或php中所说的函数
					唯一的区别
						这里的函数必须返回一个数据(值);
					定义形式
						create function getMaxValue(p1 int,p2 int,p3 float)
						returns float #返回float类型
						BEGIN
							declare result float;
							if(p1 >= p2 and p1 >= p3) then
							BEGIN
								set result = p1;
							end;
							elseif(p2 >=p1 and p2>= p3) then
							BEGIN
								set result = p2;
							end;
							ELSE
							BEGIN
								set result = p3;
							end;
							end if;
							return result;
						end;
					调用形式：
						跟调用内部函数一样，比如
							select now(),func1() //now()是系统函数，func1()是定义的函数
					注意事项：
						1.在函数内部，可以有各种变量和流程控制的使用
						2.在函数内部，可以有各种增删改
						3.在函数内部，不可要用select或其他"返回结果集"的查询类语句
				存储过程procedure
					其本质还是函数--但是其规定，不能有返回值
					定义形式
					create procedure 存储过程名([in|out|inout]形参1 类型1，[in|out|inout]形参2 类型2)
					begin
						//
					end;
					说明：
						1.in:用于设定该变量是用来"接受实参数据的"，即"传入"，默认是不写的
						2.out:用于设定该变量是用来"存储存储过程中的数据的",即"传出"，即函数中必须对他赋值
						3.inout：是In和out的结合，具有双向的作用
						4.对于out和inout的设定，对应的"实参"就必须是一个"变量"，因为该变量是用于接收传出数据
					注意：存储过程begin和end之间可以写入以下：
						可以写完整的过程中语句
						可以写入各种的流程控制语句
						还可以增删改查等
						其中查询语句select会作为存储过程调用的结果，跟执行select语句一样，返回结果集end
					create procedure insert_get_date(p1 int,p2 tinyint,p3 bigint)
					BEGIN
						insert into tab_int(f1,f2,f3)values(p1,p2,p3);
						select * from tab_int order by f1 desc limit 0,3;
					end;
					调用存储过程
						call 存储过程名(实参1，实参2，实参3)
					删除存储过程
						drop procedure 存储过程名
					在php中使用存储函数和存储过程的示意
				触发器(trigger)
					含义：
						触发器，也是一段预先定义好的编程代码(跟存储过程和存储函数一样)并有一个名字
						但：
						他不能调用，而是，在某个表发生某个事件(增，删，改)的时候会自动触发，而调用起来
					定义形式
						create trigger 触发器名 触发时机 触发事件 on 表名 for each row
						begin
							//触发器的内部语句，不能有select语句
						end;
						说明：
							1.触发时机只有2个：before(在...之前)，after(在...之后)
							2.触发事件只有3个:insert,update,delete
							3.即触发器的含义是；在某个表上进行update或(insert/delete)之前/之后，就会去执行其中写好的代码
								即每个表只有6个情形可能调用该触发器
							4.通常触发器在对某个表进行增删改的操作的时候，需要同时去做另外一件事情的时候
							5.在触发器的内部，有2个关键字代表某种特定的含义，可以用来获取数据：
								new：它代表当前正要执行的insert或update的时候的新行数据，通过它，可以获取这一新行
									数据的任意一个字段的值，形式为
									set @v1 = new.id;	//获取该新插入或update行的id字段的值(前提是有该id)
									set @v2 = new.age; //同上
								new：它代表当前正要执行的delete的时候的旧行数据，通过它，可以获取这一旧行
									数据的任意一个字段的值，形式为
									set @v1 = old.id;	//获取该旧行的id字段的值(前提是有该id)
									set @v2 = old.age; //同上
							
-->								
	<?php
		mysql_connect("localhost","root","123456");
		mysql_query("set names utf8");
		mysql_query("use php39");
		mysql_query("use o1");
		mysql_query("begin");
		$sql1 = "insert into o1 values(111,222,333)";
		$result1 = mysql_query($sql1);
		$sql2 = "insert into o1 values(444,12.33333333333,666)";
		$result2 = mysql_query($sql2);
		if($result1 && $result2)
		{
			mysql_query("commit;");
			echo "执行成功";
		}else
		{
			mysql_query("rollback");
			echo "执行失败";
		}
	?>
</body>
</html>
