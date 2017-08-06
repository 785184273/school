create table h8(
	id int auto_increment primary key,
	username varchar(10) unique key,
	password varchar(20),
	key(password),
	score float,
	time datetime,
	fav set('篮球','足球','羽毛球'),
	sex enum('男','女'),
	liuyan text
)
	engine = InnoDB,
	charset = utf8,
	auto_increment = 0
	;
insert into h8(id,username,password,score,time,fav,sex,liuyan)
		values(20,'罗伟',md5('785184273'),89.9,null,7,3,'caonimabidechenglong');
alter table h8 add column age int default 18;
create table tab_homework82(
	id int auto_increment primary key,
	username char(10) unique key,
	email varchar(50),
	key(email),
	score float,
	time datetime,
	fav set('篮球','足球','羽毛球'),
	sex enum('男','女'),
	liuyan text
)
	engine = MyIsam,
	charset = utf8,
	auto_increment = 0
	;
create table user(
		id int auto_increment primary key,
		username varchar(10) unique key not null,
		password varchar(20) not null,
		age int default 18,
		education enum('高中','初中','大专','本科'),
		fav set('篮球','排球','足球'),
		sex enum('男','女'),
		`time` TIMESTAMP
)
		charset = utf8
		;
insert into user(id,username,password,age,fav,sex,`time`)
			values(null,'成事不足',md5('caonima'),default,4,7,2,null);