select *
from student inner join pro
on student.院系id = pro.院系id
where 院系名称= '计算机系';
select pro.*
from student inner join pro
on student.院系id = pro.院系id
where 学生 = '韩顺平';
select 院系名称
from pro
where 系办地址 like "行政楼%";
select 性别,count(学生) as 人数
from student
group by 性别;
select *
from pro
where 院系id = (select 院系id from student
				group by 院系id
				having count(*) = (
				select count(*) from student 
				group by 院系id
				order by count(*) desc limit 1
				)
			);
/*
select 院系名称,count(*) as 人数
from student inner join pro
on student.院系id = pro.院系id
group by 院系id
order by 人数 desc
limit 1;
*/
select 性别,count(*) as 人数 from student where 院系id = (
select 院系id from student
				group by 院系id
				having count(*) = (
				select count(*) from student 
				group by 院系id
				order by count(*) desc limit 1
				)
			)
group by 性别;
select *
from student
where 籍贯 = (select 籍贯 from student where 学生 = '罗弟华') and 学生 <> '罗弟华';
select pro.*
from student inner join pro
on student.院系id = pro.院系id
where 籍贯 = '河北';
select *
from student
where 院系id = (select 院系id
				from student
				where 性别 = '女' and 籍贯 = '河北'
);
