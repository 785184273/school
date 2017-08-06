//1
	select 姓名,专业,总学分
	from xsb;
//2
	select 学号 as number,姓名 as name,总学分 as mark
	from xsb
	where 专业 = '计算机';
//3
	select distinct kcb.课程名,kcb.课程号
	from kcb inner join cjb
	on kcb.课程号 = cjb.课程号;
//4
	select xsb.*,课程号
	from xsb left outer join cjb
	on xsb.学号 = cjb.学号;
//5
	select *
	from xsb
	where 总学分 > 50;
//6
	select * 
	from xsb
	where 专业 = '计算机' and 性别 = '女';
//7
	select 学号,姓名,性别
	from xsb
	where 姓名 like '王%';
//8
	select 学号,姓名,专业
	from xsb
	where 姓名 REGEXP '^李';
//9
	select 学号,姓名,专业
	from xsb
	where 学号 REGEXP '[4,5,6]';
	-------
	select 学号,姓名,专业
	from xsb
	where 学号 like '%4%' or 学号 LIKE '%5%' or 学号 like '%6%';
//10
	select 学号,姓名,专业
	from xsb
	where 学号 like '08%' or 学号 like '%08';
//11
	select *
	from xsb
	where 出生日期 not between '19891-1-1' and '1989-12-31';
//12
	select *
	from xsb
	where 专业 in ('计算机','通信工程','无线电');
//13
	select *
	from xsb
	where 总学分 is null;
//14
	select 学号,姓名
	from xsb
	where 学号 in(select 学号
				from cjb
				where 课程号 = 206);
//15
	select 学号
	from cjb
	where 课程号 = (
					select 课程号
					from kcb
					where 课程名 = '离散数学');
//16
	select 学号,姓名,专业,出生日期
	from xsb
	where 出生日期 < all(
					select 出生日期
					from xsb
					where 专业 = '计算机系');
//17
	select 姓名
	from xsb
	where exists(
				select *
				from cjb
				where 学号 = xsb.学号 and 课程号 = '206');
	-------
	select 姓名
	from xsb
	where 学号 in (
				select 学号
				from cjb
				where 课程号 = '206');
//18
	select 姓名,学号
	from xsb
	where 总学分 > 50 and 性别 = '男';
//19
	select 学号,姓名,year(出生日期)-year(
										(select 出生日期
										from xsb
										where 学号 = '081101')
										) as 年龄差距
									from xsb
									where 性别 = '女';
//20
	select count(*) as 学生总人数
	from xsb;
//21
	select count(*) as 总学分50分以上的学生人数
	from xsb
	where 总学分 > 50;
//21
	select max(成绩) as 最高分,min(成绩) as 最低分
	from cjb
	where 课程号 = 101;
//22
	select sum(成绩) AS 总成绩
	from cjb
	where 学号 = '081101';
//23
	select avg(成绩) as 平均成绩
	from cjb
	where 课程号 = 101;
//24
	select 专业
	from xsb
	group by 专业 ;
//25
	select 专业,count(*) as 学生人数
	from xsb
	group by 专业 ;
//26
	select 学号,avg(成绩) as 平均成绩
	from cjb
	group by 学号
	having avg(成绩) > 85;
//27
	select *
	from xsb
	where 专业 = '通信工程'
	order by 出生日期;
//28
	select *
	from xsb
	inner join cjb on xsb.学号 = cjb.学号
	inner join kcb on cjb.课程号 = kcb.课程号
	where 专业 = '计算机' and 课程名 = '计算机基础'
	order by 成绩 desc;
//29
	select *
	from xsb
	order by 学号
	limit 0,5;
//30
	select *
	from xsb
	order by 学号
	limit 3,5;