//演示int类型的使用
create table tab_int(fi int,f2 tinyint,f3 bigint);
create table tab_int1(
					f1 int unsigned,
					f2 tinyint zerofill,
					f3 bigint zerofill
					);
insert into tab_int1(f1,f2,f3)values(12,12,12);
//演示小数类型的使用
create table tab_xiaoshu(
					f1 float,
					f2 double,
					f3 decimal(10,3)
					);
insert into tab_xiaoshu (f1,f2,f3) values (123.456,123.456,123.456);
create table user(
				id int,
				score float,
				name varchar(10),
				`date` datetime
				);
//演示char，varchar的使用
create table tab_char_varchar(
				postcode char(6),
				name varchar(10)
);
insert into tab_char_varchar(postcode,name)values(636000,caonimabide);
//演示enum,set的使用
create table enum_set(
				id int auto_increment primary key,
				sex enum('男','女'),
				fav set('篮球','足球','排球','台球')
);
insert into enum_set (id,sex,fav) values (1,'男','篮球');
insert into enum_set (id,sex,fav) values (null,'男','篮球,排球,台球');
insert into enum_set (id,sex,fav) values (1,'女','7');
#这里的7 = 1 + 2 + 4;
//演示时间类型的字段使用
create table tab_time(
	dt datetime,
	d2 date,
	t2 time,
	y year,
	ts timestamp /*其中这个字段通常不用插入数据*/
);
insert into tab_time(dt,d2,t2,y)values('2015-7-8 10:12:30','2016-7-8','13:14:15','2016');
//演示字段属性的使用
create table tab_shuxing(
			id int auto_increment primary key,
			username varchar(20) not null unique key,
			password varchar(16) not null,
			age tinyint default 18,
			email varchar(50) comment '电子邮箱'
);
insert into tab_shuxing(id,username,password,age,email)values(null,'user1','caonima',null,null);
insert into tab_shuxing(id,username,password,age,email)values(null,'user1',md5('caonima'), ,null);
//课间练习
create table tab_lianxi(
			id int auto_increment primary key,
			username varchar(10) unique key not null,
			password varchar(10) not null,
			`time` TIMESTAMP,
			score float not null,
			age int default 18,
			email varchar(30) comment '邮箱'
);
insert into tab_lianxi(id,username,password,`time`,score,age,email)values(null,'你爸爸',md5('785184273'),null,90.8,,null);
//演示索引的创建语法
//索引其实就是创建表，和上面的语法意思是一样的
create table tab_index(
			id int auto_increment,
			username varchar(20),
			email varchar(50),
			age int,				/*没有索引*/
			key(email),				/*这是普通索引*/
			unique key(username),	/*这就是唯一索引*/
			primary key(id)			/*这就是主键索引*/
);
insert into tab_index(id,username,email)values(null,'shenmdoukey',null);
//演示外键索引
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
create table yueshu(
			id int auto_increment,
			age int,
			name varchar(10),
			password varchar(20) not null,
			unique key(name),
			check(age >= 10 and age <= 100),
			primary key(id)
);
insert into yueshu(id,age,name,password)values(null,9,'user1',md5('785184273'));
//演示表选项语法
create table xuanxiang(
	id int auto_increment primary key,
	name varchar(10),
	age tinyint
)
	charset = gbk, /*当前数据库的编码是utf8*/
	engine = MyIsam,
	auto_increment = 1000
;
insert into xuanxiang(id,name,age)values(null,'zhangsan',11);
//演示修改表
alter table xuanxiang add column email varchar(50) not null default 3366@123.com;
alter table xuanxiang change column age password varchar(20) not null default 123456;
alter table xuanxiang rename to tab_choice;
alter table tab_choice add unique key(name);
alter table tab_choice add key(email);
//演示创建一个视图
create view v1 as
select * from tab_choice;
//演示唯一性
create table tab1(
	id int,
	name varchar(10)
);
insert into tab1 values(1,'name');
insert into tab1 values(1,'name');
create table tab2(
	id int primary key,
	name varchar(10)
);
insert into tab2 values(1,'name');
insert into tab2 values(1,'name');
//创建用户
create user 'user1'@'localhost' IDENTIFIED by '123';
grant all on *.* to 'user1'@'localhost';
//创建一个函数
//目标是找三个数中最大的数
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
//注意:在cmd中执行该代码，需要更换"语句结束符"delimiter///
//创建一个存储过程
create procedure insert_get_date(p1 int,p2 tinyint,p3 bigint)
BEGIN
	insert into tab_int(f1,f2,f3)values(p1,p2,p3);
	select * from tab_int order by f1 desc limit 0,3;
end;
//创建一个存储过程对in inout 和out的使用
create procedure insert_get_date1(in p1 int,out p2 tinyint,inout p3 bigint)
BEGIN
	set p2 = p1 * 2;
	set p3 = p1 + p2 + p3;
	insert into tab_int(f1,f2,f3)values(p1,p2,p3);
end;
call insert_get_date1(10,set @a1 = 20,set @a2 = 30);
//定义一个触发器
//在表tab_int插入一行数据的时候，能够同时将这个表的第一个字段的前3大值的行写入到另一个表中
create table tab_int_max(f1 int,f2 tinyint,f3 bigint);
create trigger tri after insert on tab_int for each row
BEGIN
	select max(f1) into @maxf1 from tab_int;
	select f2 into @f2 from tab_int where f1 = @maxf1;
	select f3 into @f3 from tab_int where f1 = @maxf1;//注意赋值语句只能一句一局的写
	insert into tab_int_max(f1,f2,f3)values(@maxf1,@f2,@f3);
end;
//创建一个触发器，在表tab_int进行insert之前，将该行数据也同时插入到跟其类似结构的表中
create trigger copy before insert on tab_int for each ROW
BEGIN
	set @f1 = new.f1;
	set @f2 = new.f2;
	set @f3 = new.f3;
	insert into tab_int_max values(@f1,@f2,@f3);
end;
