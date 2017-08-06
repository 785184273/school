//6
	INSERT INTO  `cpxs`.`产品表` (
	`产品编号` ,
	`产品名称` ,
	`价格` ,
	`库存量`
	)
	VALUES (
	'0001',  '空调',  '3000',  '200'
	), (
	'0203',  '冰箱',  '2500',  '100'
	),(
	'0301',  '彩电',  '2800',  '50'
	),(
	'0203',  '微波炉',  '2500',  '50'
	);
	update 产品表 set 价格 = 价格*0.8;
	delete from 产品表 where 价格 < 50;
//10
	select 产品名称
	from 产品表
	where 价格 > 2000 or 价格 < 2900;
	----
	select sum(价格) as 总价格
	from 产品表
	----
	use cpxs
	create view BXCP
	as select * 
	from 产品表;
	----
	select *
	from BXCP
	where 库存量 < 100;
	
