	SELECT name
		FROM stu
		inner join stu_kecheng on stu.stu_id = stu_kecheng.stu_id
		inner join kecheng on kecheng.kecheng_id = stu_kecheng.kecheng_id
		where kecheng_name = "mysql";
	SELECT kecheng_name
		FROM stu
		inner join stu_kecheng on stu.stu_id = stu_kecheng.stu_id
		inner join kecheng on kecheng.kecheng_id = stu_kecheng.kecheng_id
		where name = "张三";
	select stu_id,name
		from stu
		where stu_id in(
			select stu_id 
			from stu_kecheng
			group by stu_id
			having count(*) = 1
		);
	select *
		from stu
		where stu_id in(
			select stu_id 
			from stu_kecheng
			group by stu_id
			having count(*) >= 3
		);
	select *
		from stu
		where stu_id in(
			select stu_id 
			from stu_kecheng
			group by stu_id
			having count(*) = (
				select count(*)
				from kecheng
			)
		);
	select count(*) from(
		select stu_id,count(*)
		from stu_kecheng
		group by stu_id
		) as t;
//创建一个用户名
create user 'user11'@'localhost' IDENTIFIED by '123456';
create table tab_lianxi(
	f1 int,
	f2 int,
	f3 int
);
grant select on user11.tab_lianxi to 'user11'@'localhost';
REVOKE select on user11.tab_lianxi to 'user11'@'localhost';
	insert into tab2 values(3,"shabi");
	insert into tab2 values(2,"nimabi");
//创建一个存储过程
create procedure cunchu_1(p1 int,p2 int,p3 int)
BEGIN
	insert into tab_int values(p1,p2,p3);
end;
call cunchu_1(1,2,3);
//in out inout存储过程的演示
create procedure cunchu_2(in p1 int,out p2 int,inout p3 int)
BEGIN
	set p2 = 2 * p1;
	set p3 = p1 + p2 + p3 + (2 * p2);
	insert into tab_int values(p1,p2,p3);
	select * from tab_int;
end;
//创建一个存储函数
create function fun_1(p1 int,p2 int,p3 int)
returns float
BEGIN
	insert into tab_int values(p1,p2,p3);
	return 1;
end;
//函数的调用
select fun_1(11,22,33);