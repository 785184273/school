create table product(
	pro_id int auto_increment primary key,
	pro_name varchar(40),
	protype_id int,
	price float,
	pinpai varchar(6),
	chandi varchar(6)
);
insert into product(pro_id,pro_name,protype_id,price,pinpai,chandi)
			values(1,'康佳(KONKA)42英寸全高清液晶电视',1,1999,'康佳','深圳');
insert into product(pro_id,pro_name,protype_id,price,pinpai,chandi)
			values(2,'索尼(SONY)4G手机(黑色)',2,3238,'索尼','深圳');
insert into product(pro_id,pro_name,protype_id,price,pinpai,chandi)
			values(3,'海信(HISENSE)55英寸智能电视(黑色)',1,4199,'海信','青岛');
insert into product(pro_id,pro_name,protype_id,price,pinpai,chandi)
				values(4,'联想(lenovo)14.0寸笔记本',3,5499,'联想','北京');