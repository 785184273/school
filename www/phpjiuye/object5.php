<meta charset = "utf-8"/>
<?php
	//equire'./object5-1.php';
	//类的自动加载
	function __autoload($name){
		require_once'./object5-1.php';
	}
	$config = array(
		'localhost' => "localhost",
		'port' => 3306,
		'user' => "root",
		'password' => "123456",
		'charset' => "utf8",
		'database' => "php39"
	);
	//$obj = new MysqlDatabase($config);
	$obj = MysqlDatabase::getObject($config);
	$obj1 = MysqlDatabase::getObject($config);
	//$obj1 = clone $obj;	 //对象的克隆能突破单例模式
	var_dump($obj);
	var_dump($obj1);
	/*
		单例类的加强：禁止克隆
			对于一个类的对象，如果使用clone运算符，就会克隆出一个跟当前
			对象完全一样的新对象出来，并且：
				此时还会自动调用该类中的魔术方法:__clone()，只要其中有该方法
				则，要想实现单例类，就应该对这个单例类的对象"禁止克隆"
				做法，私有化该魔术方法：__clone()
			
	*/
	//var_dump($obj1);
	//$obj->linkstart();
	//$obj->set("gbk");
	//$obj->database("liuyan");
	//$obj->usedatabase();
	//echo mysql_query("show tables");
	//增删改语句
	$sql0 = "insert into tab_int(f1,f2,f3)values(11,22,33)";
	var_dump ($obj->exec($sql0));
	//一维数组
	$sql = "select distinct * from tab_int where f3 = 33";
	$result = $obj->getOneRow($sql);
	$arr = array();
	$row = mysql_fetch_array($result);
		mysql_free_result($result);	//提前施放资源
		$arr[] = $row;
		/*
		$count = mysql_num_fields($result);
		for($i = 0;$i < $count;++$i){
			echo $row[$i]."<br />";
		}
		*/
	var_dump($arr);
	echo "<hr />";
	//二维数组
	$sql1 = "select * from tab_int";
	$result = $obj->getRows($sql1);
	$arr = array();
	while($row = mysql_fetch_array($result)){
		/*
		$str = " ";
		$count = mysql_num_fields($result);
		for($i = 0;$i < $count;++$i){
			if($i == $count - 1){
				$str = $str.$row[$i]."<br />"; 
			}else{
				$str = $str.$row[$i]." ";
			}
			
		}
		*/
		$arr[] = $row;
		//echo $str;
	}
	mysql_free_result($result);	//提前施放资源
	var_dump($arr);
	echo "<hr />";
	//一个数据值
	$sql2 = "select sum(f1) from tab_int";
	$result = $obj->getdata($sql2);
	$row = mysql_fetch_array($result);
	mysql_free_result($result);	//提前施放资源
		echo "<br />".$row[0];
	$obj->close();
?>
<!--
设计一个类：mysql数据库操作类
	设计目标
		1.该类一实例化，就可以自动连接上mysql数据库
		2.该类可以单独去设定要使用的连接编码(set names XXX)
		3.该类可以单独去设定要使用的数据库(use XXX)
		4.可以关闭连接
		5.用该对象可以执行任意的增删改语句，并返回布尔值
		6.用该类的对象可以执行返回一行数据的"查询语句"：结果是一个一维数组
		7.用该类的对象可以执行返回多行数据的"查询语句"：结果是一个二维数组
		8.用该类的对象可以执行返回一个数据的"查询语句"：结果是一个数据值

-->